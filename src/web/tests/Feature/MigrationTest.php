<?php

use Illuminate\Support\Facades\Schema;

it('creates all custom tables', function () {
    $tables = [
        'players', 'teams', 'events', 'event_teams', 'rosters',
        'groups', 'group_standings', 'brackets', 'servers', 'match_configs',
        'matches', 'match_maps', 'map_scores', 'match_players', 'player_snapshots',
        'kills', 'round_events', 'round_summaries', 'heatmap_points',
        'announcements', 'maps',
    ];

    foreach ($tables as $table) {
        expect(Schema::hasTable($table))->toBeTrue("Table {$table} should exist");
    }
});

it('adds is_admin column to users table', function () {
    expect(Schema::hasColumn('users', 'is_admin'))->toBeTrue();
});

it('creates matches table with required columns', function () {
    $columns = [
        'id', 'uuid', 'server_id', 'event_id', 'group_id', 'bracket_id',
        'team_a_id', 'team_b_id', 'team_a_name', 'team_b_name',
        'team_a_country', 'team_b_country', 'status', 'is_paused',
        'score_a', 'score_b', 'best_of', 'max_rounds',
        'overtime_start_money', 'overtime_max_rounds', 'overtime_enabled',
        'knife_round_enabled', 'auto_switch_sides', 'streamer_mode',
        'heatmap_enabled', 'map_selection_mode', 'scheduled_at',
        'started_at', 'ended_at', 'bracket_round', 'bracket_position',
        'auth_key', 'created_at', 'updated_at',
    ];

    foreach ($columns as $column) {
        expect(Schema::hasColumn('matches', $column))->toBeTrue("Column matches.{$column} should exist");
    }
});

it('creates match_players table with stat columns', function () {
    $columns = [
        'id', 'match_id', 'match_map_id', 'player_id', 'steam_id', 'name', 'team_side',
        'kills', 'assists', 'deaths', 'headshots', 'team_kills',
        'bomb_plants', 'bomb_defuses',
        'rounds_with_1k', 'rounds_with_2k', 'rounds_with_3k', 'rounds_with_4k', 'rounds_with_5k',
        'clutch_1v1', 'clutch_1v2', 'clutch_1v3', 'clutch_1v4', 'clutch_1v5',
        'first_kills', 'first_deaths', 'rating',
        'created_at', 'updated_at',
    ];

    foreach ($columns as $column) {
        expect(Schema::hasColumn('match_players', $column))->toBeTrue("Column match_players.{$column} should exist");
    }
});

it('creates match_maps table with required columns', function () {
    $columns = [
        'id', 'match_id', 'map_name', 'map_order',
        'score_team_a', 'score_team_b', 'status', 'current_side',
        'overtime_count', 'demo_file_path', 'created_at', 'updated_at',
    ];

    foreach ($columns as $column) {
        expect(Schema::hasColumn('match_maps', $column))->toBeTrue("Column match_maps.{$column} should exist");
    }
});

it('creates events table with required columns', function () {
    $columns = [
        'id', 'name', 'description', 'location', 'start_date', 'end_date',
        'logo_path', 'link', 'is_active', 'created_at', 'updated_at',
    ];

    foreach ($columns as $column) {
        expect(Schema::hasColumn('events', $column))->toBeTrue("Column events.{$column} should exist");
    }
});
