<?php

namespace App\Filament\Widgets;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use App\Models\Order;


class SalesChart extends ChartWidget
{
    
    protected static ?int $sort = 2; // this for sort element of dashboard
    use ExposesTableToWidgets; // this is making the data real-time
    protected static ?string $heading = 'Sales This Month';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->dateAlias('created_at')
        ->perDay()
        ->sum('order_total_amount');

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
        return 'pie';
    }
}
