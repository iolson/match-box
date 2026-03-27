<?php

use App\Models\GameMatch;
use App\Models\Server;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $server = new Server();
    expect($server->getFillable())->toContain('ip', 'rcon_password', 'hostname', 'gotv_ip', 'is_available');
});

it('casts attributes correctly', function () {
    $server = new Server();
    $casts = $server->getCasts();
    expect($casts)->toHaveKey('rcon_password')
        ->and($casts['rcon_password'])->toBe('encrypted')
        ->and($casts)->toHaveKey('is_available')
        ->and($casts['is_available'])->toBe('boolean');
});

it('has matches relationship', function () {
    $server = new Server();
    expect($server->matches())->toBeInstanceOf(HasMany::class);
});
