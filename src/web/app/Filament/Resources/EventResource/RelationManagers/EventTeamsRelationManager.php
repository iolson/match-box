<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Team;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class EventTeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'eventTeams';

    protected static ?string $title = 'Teams';

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('team_id')
                ->label('Team')
                ->options(Team::query()->orderBy('name')->pluck('name', 'id'))
                ->required()
                ->searchable(),
            Forms\Components\TextInput::make('seed')
                ->numeric()
                ->minValue(1),
            Forms\Components\TextInput::make('group')
                ->maxLength(50),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Team')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('seed')
                    ->sortable(),
                Tables\Columns\TextColumn::make('group'),
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
