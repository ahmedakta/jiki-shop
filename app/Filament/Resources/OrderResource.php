<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?int $navigationSort =2;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static ?string $navigationLabel = 'Orders'; // this for change the default text of Resource

    protected static ?string $navigationGroup = 'SHOP';
    

    public static function getNavigationBadge(): ?string
    {
        // return 'NEW';
        return static::getModel()::whereDate('created_at' , today())->count();
    }
    // public static function getNavigationGroups(): void
    // {
    //    Filament::registerNavigationGroups([
    //         NavigationGroup::make()
    //         ->label('Users')
    //         ->icon('heroicon-o-users')
    //         ->collapsed(),
    //    ]);
    // }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
