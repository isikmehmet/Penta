<?php

namespace App\Filament\Resources\UrunlerResource\Pages;

use App\Filament\Resources\UrunlerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUrunler extends CreateRecord
{
    protected static string $resource = UrunlerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
