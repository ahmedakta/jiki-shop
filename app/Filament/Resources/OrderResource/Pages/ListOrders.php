<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Order;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
            // Add tabs to the list
    public function getTabs(): array
    {
        return [
            'All' => Tab::make('All')
            ->badge(Order::count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query;
                }
            ),
            'inProgress' => Tab::make('In Progress')
            ->badge(Order::where('status' , 2)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('status' , 2);
                }
            ),
            'ready' => Tab::make('Ready Orders')
            ->badge(Order::where('status' , 3)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('status' ,3);
                }
            ),
            'completed' => Tab::make('Completed Orders')
            ->badge(Order::where('status' , 1)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('status' , 1);
                }
            ),
            'cancelled' => Tab::make('Cancelled Orders')
            ->badge(Order::where('status' , 0)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('status' , 0);
                }
            ),
        ];
    }
}
