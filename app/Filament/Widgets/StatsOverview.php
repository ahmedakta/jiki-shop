<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use App\Models\Order;

class StatsOverview extends BaseWidget
{
    use ExposesTableToWidgets; // this is making the data real-time     
    protected function getStats(): array
    {
        return [
            Stat::make('Orders Today', Order::whereDate('created_at' , today())->count()),
            Stat::make('Total Orders', Order::count()),
            Stat::make('', '%12'),
        ];
    }
}
