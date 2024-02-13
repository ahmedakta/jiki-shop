<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Resources\Resource;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-view-columns';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'SHOP';

    // This is Globalsearch
    protected static ?string $recordTitleAttribute = 'product_title';

    // custimze the global search
    public static function getGlobalSearchResultTitle(Model $record): string{
        return $record->product_title;
    }

    // search in db attr
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'product_title',
            'product_desc', 
        ];
    } 

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->brand ? $record->brand : '',
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        // return 'NEW';
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Create a product')
                ->description('Create product over here.')
                ->collapsible()
                // ->aside()
                ->schema([
                    TextInput::make('product_title')->placeholder('Title')->required(),
                    Select::make('category_id',)->relationship('category' , 'category_name')->required(),
                    MarkdownEditor::make('product_desc')->placeholder('Description')->columnSpan('full')->required(),
                    FileUpload::make('product_photos')
                    ->multiple()
                    ->imageEditor() // for edit image
                    ->appendFiles()// when add new one ,adding it in the end
                    ->uploadingMessage('Uploading attachment...') // set message during upload
                    ->openable()
                    ->minFiles(2)
                    ->maxFiles(5)
                    // ->acceptedFileTypes(['.jpeg' , '.jpg' , '.png'])
                    ->enableReordering()
                    ->enableDownload()
                    ->columnSpan('full'),//->disk('public')->directory('images')
                    TextInput::make('product_price')->numeric()->suffixIcon('heroicon-m-globe-alt')->inputMode('decimal')->placeholder('Price')->required(),
                    TextInput::make('product_stocks')->numeric()->placeholder('Stocks')->required(),
                    ToggleButtons::make('status')->options([
                        '2' => 'Draft',
                        '3' => 'Scheduled',
                        '1' => 'Published'
                        ])->required(),
                    ])->columns(2),
                    Section::make('Features')->schema([
                            Toggle::make('product_water_resistance')->required(),
                            Toggle::make('product_customization')->required(),
                            
                    ])->columns([
                        'default'=>2, // responsife settings
                        'md' => 2,
                        'lg' => 3,
                        'xl' => 4,
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('product_title')->sortable()->searchable(),
                TextColumn::make('product_price'),
                TextColumn::make('product_stocks'),
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
                // This for add filter to table
                Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
