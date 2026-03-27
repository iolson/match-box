<?php

namespace App\Filament\Resources;

use App\Enums\MatchStatus;
use App\Filament\Resources\MatchResource\Pages;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\GameMatch;
use App\Models\Server;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class MatchResource extends Resource
{
    protected static ?string $model = GameMatch::class;

    protected static ?string $slug = 'matches';

    protected static ?string $modelLabel = 'Match';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-play';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('server_id')
                ->label('Server')
                ->options(Server::query()->orderBy('ip')->pluck('ip', 'id'))
                ->searchable()
                ->nullable(),
            Forms\Components\Select::make('event_id')
                ->label('Event')
                ->options(Event::query()->orderBy('name')->pluck('name', 'id'))
                ->searchable()
                ->nullable(),
            Forms\Components\Select::make('team_a_id')
                ->label('Team A')
                ->options(
                    EventTeam::query()
                        ->with('team')
                        ->get()
                        ->mapWithKeys(fn(EventTeam $et) => [$et->id => $et->team?->name ?? "Team #{$et->id}"])
                )
                ->searchable()
                ->nullable(),
            Forms\Components\Select::make('team_b_id')
                ->label('Team B')
                ->options(
                    EventTeam::query()
                        ->with('team')
                        ->get()
                        ->mapWithKeys(fn(EventTeam $et) => [$et->id => $et->team?->name ?? "Team #{$et->id}"])
                )
                ->searchable()
                ->nullable(),
            Forms\Components\Select::make('status')
                ->options(collect(MatchStatus::cases())->mapWithKeys(
                    fn(MatchStatus $s) => [$s->value => $s->label()]
                ))
                ->required()
                ->default(MatchStatus::NotStarted->value),
            Forms\Components\TextInput::make('best_of')
                ->numeric()
                ->default(1)
                ->minValue(1)
                ->maxValue(5),
            Forms\Components\TextInput::make('max_rounds')
                ->numeric()
                ->default(24),
            Forms\Components\Toggle::make('overtime_enabled')
                ->default(false),
            Forms\Components\Toggle::make('knife_round_enabled')
                ->default(false),
            Forms\Components\DateTimePicker::make('scheduled_at')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('uuid')
                    ->searchable()
                    ->limit(12),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn(MatchStatus $state) => $state->label())
                    ->sortable(),
                Tables\Columns\TextColumn::make('score_a')
                    ->label('Score A'),
                Tables\Columns\TextColumn::make('score_b')
                    ->label('Score B'),
                Tables\Columns\TextColumn::make('scheduled_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListMatches::route('/'),
            'create' => Pages\CreateMatch::route('/create'),
            'edit' => Pages\EditMatch::route('/{record}/edit'),
        ];
    }
}
