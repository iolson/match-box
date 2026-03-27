<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Player;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class RostersRelationManager extends RelationManager
{
    protected static string $relationship = 'rosters';

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('player_id')
                ->label('Player')
                ->options(Player::query()->orderBy('name')->pluck('name', 'id'))
                ->required()
                ->searchable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('player.name')
                    ->label('Player')
                    ->searchable(),
                Tables\Columns\TextColumn::make('player.steam_id')
                    ->label('Steam ID'),
            ])
            ->filters([])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ])
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
}
