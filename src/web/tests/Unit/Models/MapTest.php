<?php

use App\Models\Map;

it('has fillable attributes', function () {
    $map = new Map();
    expect($map->getFillable())->toContain('name', 'display_name', 'image_path', 'is_active', 'sort_order');
});

it('casts attributes correctly', function () {
    $map = new Map();
    $casts = $map->getCasts();
    expect($casts)->toHaveKey('is_active')
        ->and($casts['is_active'])->toBe('boolean');
});
