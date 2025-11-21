<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Générales')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('city_id')
                            ->relationship('city', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('property_type_id')
                            ->relationship('type', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Détails')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('€'),
                        Forms\Components\TextInput::make('area')
                            ->required()
                            ->numeric()
                            ->suffix('m²'),
                        Forms\Components\TextInput::make('bedrooms')
                            ->required()
                            ->numeric()
                            ->label('Chambres'),
                        Forms\Components\TextInput::make('bathrooms')
                            ->required()
                            ->numeric()
                            ->label('Salles de bain'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Actif',
                                'inactive' => 'Inactif',
                                'sold' => 'Vendu',
                            ])
                            ->required()
                            ->default('active'),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Mettre en avant')
                            ->default(false),
                    ])->columns(3),

                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->image()
                                    ->directory('properties')
                                    ->required(),
                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->defaultItems(0)
                            ->grid(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images.image_path')
                    ->label('Image')
                    ->limit(1)
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('eur')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'warning' => 'sold',
                        'danger' => 'inactive',
                    ]),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('city')
                    ->relationship('city', 'name'),
                Tables\Filters\SelectFilter::make('type')
                    ->relationship('type', 'name'),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Actif',
                        'inactive' => 'Inactif',
                        'sold' => 'Vendu',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
