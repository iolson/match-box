<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Server extends Model
{
    protected $fillable = [
        'ip',
        'rcon_password',
        'hostname',
        'gotv_ip',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'rcon_password' => 'encrypted',
            'is_available' => 'boolean',
        ];
    }

    public function matches(): HasMany
    {
        return $this->hasMany(GameMatch::class);
    }
}
