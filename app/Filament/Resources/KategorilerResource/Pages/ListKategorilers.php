<?php

namespace App\Filament\Resources\KategorilerResource\Pages;

use App\Filament\Resources\KategorilerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategorilers extends ListRecords
{
    protected static string $resource = KategorilerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
