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
            Stat::make('Orders Today', Order::count()),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
