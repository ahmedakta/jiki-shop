<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class StatsOverview extends BaseWidget
{
    use ExposesTableToWidgets; // this is making the data real-time     
    protected function getStats(): array
    {
        return [
            Card::make('Orders Today', Order::whereDate('created_at' , today())->count()),
            Card::make('Total Orders', Order::count()),
            Card::make('Completed Orders', Order::where('status' , 1)->count()),
            Stat::make('Users', User::count())
            ->icon('heroicon-o-users')
            ->description('Users from the website.')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),
            Stat::make('Sales rate', '21%')
            ->icon('heroicon-o-users')
            ->description('7% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->chart([30  , 32, 35, 40 ,45 , 50])
            ->color('danger'),
            Stat::make('Sales Count', '120')
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
