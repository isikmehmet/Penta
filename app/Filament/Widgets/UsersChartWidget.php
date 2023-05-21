<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\User;
use Filament\Widgets\BarChartWidget;

class UsersChartWidget extends BarChartWidget
{
    protected static ?string $heading = 'Kullanıcılar';

    protected function getData(): array {
        $users = User::select('created_at')->orderBy('created_at', 'ASC')->get()->groupBy(function($users) {
            return Carbon::parse($users->created_at)->translatedFormat('F');
        });

        $totals = [];

        foreach ($users as $user => $value) {
            $totals[] = $value->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Katılan kullanıcılar',
                    'data' => $totals,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $users->keys(),
        ];
    }
}
