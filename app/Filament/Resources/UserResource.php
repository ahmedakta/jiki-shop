<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
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

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Create a user')
                ->description('Create user over here.')
                ->collapsible()
                // ->aside()
                ->schema([
                    TextInput::make('name')->placeholder('Name')->required(),
                    TextInput::make('email')->email()->placeholder('E-mail')->required(),
                    TextInput::make('password')->password()->revealable()->placeholder('Password')->required(),
                    // TextInput::make('name')->placeholder('Title')->required(),
                    // Select::make('parent_id')->options(Category::where(['parent_id' => 0 , 'status' => 1])->pluck('category_name', 'id'))->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email'),
                IconColumn::make('status')
                ->options([
                    'heroicon-o-check-circle' => fn ($state , $record): bool => $record->status === 1,
                    'heroicon-o-x-circle' => fn ($state , $record): bool => $record->status === 0,
                    'heroicon-o-clock' => 3,
                ])->colors([
                    'warning' => 3,
                    'danger' => 0,
                    'success' => 1,
                ]),
                TextColumn::make('created_at')
                ->date()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
