<?php

use App\Enums\WinType;
use App\Models\GameMatch;
use App\Models\MatchMap;
use App\Models\RoundSummary;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $summary = new RoundSummary();
    expect($summary->getFillable())->toContain(
        'match_id',
        'match_map_id',
        'round_number',
        'win_type',
        'winning_team',
        'winning_side',
        'bomb_planted',
        'bomb_defused',
        'bomb_exploded',
        'score_a',
        'score_b',
        'backup_file'
    );
});

it('casts attributes correctly', function () {
    $summary = new RoundSummary();
    $casts = $summary->getCasts();
    expect($casts)->toHaveKey('win_type')
        ->and($casts['win_type'])->toBe(WinType::class)
        ->and($casts)->toHaveKey('bomb_planted')
        ->and($casts['bomb_planted'])->toBe('boolean')
        ->and($casts)->toHaveKey('bomb_defused')
        ->and($casts['bomb_defused'])->toBe('boolean')
        ->and($casts)->toHaveKey('bomb_exploded')
        ->and($casts['bomb_exploded'])->toBe('boolean');
});

it('has match relationship', function () {
    $summary = new RoundSummary();
    expect($summary->match())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMap relationship', function () {
    $summary = new RoundSummary();
    expect($summary->matchMap())->toBeInstanceOf(BelongsTo::class);
});
