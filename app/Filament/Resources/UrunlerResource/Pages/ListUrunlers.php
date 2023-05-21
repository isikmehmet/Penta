<?php

namespace App\Filament\Resources\UrunlerResource\Pages;

use App\Filament\Resources\UrunlerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUrunlers extends ListRecords
{
    protected static string $resource = UrunlerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
