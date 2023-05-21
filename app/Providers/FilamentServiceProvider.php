<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use App\Filament\Resources\UserResource;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function() {
            if (auth()->user())
            {
                if (auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['super-admin', 'admin', 'moderator'])){
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Kullanıcıları Yönet')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-users')
                    ]);
                }
            }
        });
    }
}
