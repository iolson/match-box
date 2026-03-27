<?php

use App\Models\Announcement;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $announcement = new Announcement();
    expect($announcement->getFillable())->toContain('event_id', 'message', 'is_active');
});

it('casts attributes correctly', function () {
    $announcement = new Announcement();
    $casts = $announcement->getCasts();
    expect($casts)->toHaveKey('is_active')
        ->and($casts['is_active'])->toBe('boolean');
});

it('has event relationship', function () {
    $announcement = new Announcement();
    expect($announcement->event())->toBeInstanceOf(BelongsTo::class);
});
