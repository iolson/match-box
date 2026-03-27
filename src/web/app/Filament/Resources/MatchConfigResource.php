<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatchConfigResource\Pages;
use App\Models\MatchConfig;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class MatchConfigResource extends Resource
{
    protected static ?string $model = MatchConfig::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $modelLabel = 'Match Config';

    protected static ?string $pluralModelLabel = 'Match Configs';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('best_of')
                ->numeric()
                ->required()
                ->default(1)
                ->minValue(1)
                ->maxValue(5),
            Forms\Components\TextInput::make('max_rounds')
                ->numeric()
                ->required()
                ->default(24),
            Forms\Components\TextInput::make('overtime_start_money')
                ->numeric()
                ->default(10000),
            Forms\Components\TextInput::make('overtime_max_rounds')
                ->numeric()
                ->default(6),
            Forms\Components\Toggle::make('overtime_enabled')
                ->default(false),
            Forms\Components\Toggle::make('knife_round_enabled')
                ->default(false),
            Forms\Components\Toggle::make('streamer_mode')
                ->default(false),
            Forms\Components\Toggle::make('heatmap_enabled')
                ->default(false),
            Forms\Components\Toggle::make('is_default')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('best_of'),
                Tables\Columns\TextColumn::make('max_rounds'),
                Tables\Columns\IconColumn::make('is_default')
                    ->boolean(),
            ])
            ->filters([])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatchConfigs::route('/'),
            'create' => Pages\CreateMatchConfig::route('/create'),
            'edit' => Pages\EditMatchConfig::route('/{record}/edit'),
        ];
    }
}
