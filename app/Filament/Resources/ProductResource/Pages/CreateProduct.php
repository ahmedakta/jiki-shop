<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    // To handle store
    protected function handleRecordCreation(array $data): Model
    {
        $photos = $data['product_photos'];
        $json = [];
        foreach ($photos as $key => $value) {
            array_push($json , [
                'name' => $value,
                'isfeatured' => 0,
            ]);
        }
        $data['product_photos'] = $json;
        $record =  static::getModel()::create($data);
        return $record;
    }
}
