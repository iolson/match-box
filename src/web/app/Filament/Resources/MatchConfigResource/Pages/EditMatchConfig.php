<?php

namespace App\Filament\Resources\MatchConfigResource\Pages;

use App\Filament\Resources\MatchConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatchConfig extends EditRecord
{
    protected static string $resource = MatchConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
