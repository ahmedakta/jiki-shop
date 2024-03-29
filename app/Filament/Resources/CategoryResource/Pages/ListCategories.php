<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

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
            ->badge(Category::where('parent_id','!=' ,  0)->where('status' , 1)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('parent_id' , '!=' , 0);
                }
            ),
            'Products' => Tab::make('Products Categories')
            ->badge(Category::where('parent_id' , 1)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('parent_id' , Category::PRODUCT_CATEGORIES);
                }
            ),
            'Pages' => Tab::make('Pages Categories')
            ->badge(Category::where('parent_id' , 2)->count())
            ->modifyQueryUsing(function (Builder $query)
                {
                    return $query->where('parent_id' , Category::PAGES_CATEGORIES);
                }
            ),
        ];
    }
}
