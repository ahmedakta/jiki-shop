<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListProducts extends ListRecords
{
    use ExposesTableToWidgets; // this is making the data real-time 
    
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\ProductResource\Widgets\StatsOverview::class,
        ];
    }
}
