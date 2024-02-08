<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn; 
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    
    public static ?string $navigationLabel = 'Categories'; // this for change the default text of Resource

    protected static ?string $modelLabel = 'Categories';
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    // truck -for shipping later
    // ellipsis-horizontal : 3 poins (or vertival)
    // bell notifiaction

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'CATEGORIES';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Create a category')
                ->description('Create category over here.')
                ->collapsible()
                // ->aside()
                ->schema([
                    TextInput::make('category_name')->placeholder('Title')->required(),
                    Select::make('parent_id')->options(Category::where(['parent_id' => 0 , 'status' => 1])->pluck('category_name', 'id'))->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('category_name')->sortable()->searchable(),
                TextColumn::make('category_slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
