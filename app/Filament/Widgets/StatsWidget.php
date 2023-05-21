<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Görüntüleme', '1369')
                ->description('7.1k kez tekrarlandı')
                ->chart([40, 15, 30, 22, 45, 15, 78])
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Sayfada kalma oranı', '55%')
                ->description('12% düşüş')
                ->descriptionIcon('heroicon-s-trending-down'),
            Card::make('Ortalama sayfa başı süre', '0:48')
                ->description('3% artış')
                ->descriptionIcon('heroicon-s-trending-up'),
        ];
    }
}
