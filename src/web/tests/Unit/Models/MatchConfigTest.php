<?php

use App\Models\MatchConfig;

it('has fillable attributes', function () {
    $config = new MatchConfig();
    expect($config->getFillable())->toContain(
        'name',
        'best_of',
        'max_rounds',
        'overtime_start_money',
        'overtime_max_rounds',
        'overtime_enabled',
        'knife_round_enabled',
        'streamer_mode',
        'heatmap_enabled',
        'is_default'
    );
});

it('casts attributes correctly', function () {
    $config = new MatchConfig();
    $casts = $config->getCasts();
    expect($casts)->toHaveKey('overtime_enabled')
        ->and($casts['overtime_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('knife_round_enabled')
        ->and($casts['knife_round_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('streamer_mode')
        ->and($casts['streamer_mode'])->toBe('boolean')
        ->and($casts)->toHaveKey('heatmap_enabled')
        ->and($casts['heatmap_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_default')
        ->and($casts['is_default'])->toBe('boolean');
});
