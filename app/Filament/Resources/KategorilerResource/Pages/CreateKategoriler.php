<?php

namespace App\Filament\Resources\KategorilerResource\Pages;

use App\Filament\Resources\KategorilerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriler extends CreateRecord
{
    protected static string $resource = KategorilerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
