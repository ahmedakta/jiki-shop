<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Order;

class LatestOrders extends BaseWidget
{
    protected static ?int $sort = 3; // this for sort element of dashboard
    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query())
            ->defaultSort('created_at' , 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('order_total_amount'),
                Tables\Columns\TextColumn::make('status')
            ]);
    }
}
