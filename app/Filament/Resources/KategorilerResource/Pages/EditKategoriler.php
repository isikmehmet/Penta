<?php

namespace App\Filament\Resources\KategorilerResource\Pages;

use App\Filament\Resources\KategorilerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriler extends EditRecord
{
    protected static string $resource = KategorilerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
