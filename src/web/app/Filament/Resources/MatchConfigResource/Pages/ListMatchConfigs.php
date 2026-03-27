<?php

namespace App\Filament\Resources\MatchConfigResource\Pages;

use App\Filament\Resources\MatchConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatchConfigs extends ListRecords
{
    protected static string $resource = MatchConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
