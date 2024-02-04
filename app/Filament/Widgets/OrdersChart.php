<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Order;

class OrdersChart extends ChartWidget
{
    protected static ?int $sort = 2; // this for sort element of dashboard
    use ExposesTableToWidgets; // this is making the data real-time
    protected static ?string $heading = 'Orders This Month';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->dateAlias('created_at')
        ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Created orders',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
