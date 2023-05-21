<?php

namespace App\Filament\Resources\UrunlerResource\Pages;

use App\Filament\Resources\UrunlerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUrunler extends EditRecord
{
    protected static string $resource = UrunlerResource::class;

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
