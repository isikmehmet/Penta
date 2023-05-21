<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UrunlerResource\Pages;
use App\Filament\Resources\UrunlerResource\RelationManagers;
use App\Filament\Resources\UrunlerResource\RelationManagers\KategoriRelationManager;
use App\Models\UrunModel as Urunler;
use App\Models\KategoriModel;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UrunlerResource extends Resource
{
    protected static ?string $model = Urunler::class;
    protected static ?string $modelLabel = 'Ürün';
    protected static ?string $pluralModelLabel = 'Ürünler';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Ürün Adı')
                    ->required()
                    ->maxLength(255),
                Select::make('catId')
                    ->relationship('Kategori', 'name')
                    ->label('Kategori')
                    ->required(),
                RichEditor::make('description')
                    ->label('Açıklama')
                    ->disableAllToolbarButtons()
                    ->enableToolbarButtons([
                        'bold',
                        'italic',
                        'redo',
                        'undo',
                        'strike',
                        'preview',
                    ])
                    ->maxLength(1000),
                TextInput::make('keywords')
                    ->label('Anahtar Kelimeler')
                    ->maxLength(255),
                FileUpload::make('mainPic')
                    ->disk('local')
                    ->directory('product_pics')
                    ->label('Ana Resim')
                    ->maxSize(61440),
                TextInput::make('price')
                    ->label('Fiyat')
                    ->required()
                    ->mask(fn (TextInput\Mask $mask) => $mask
                        ->patternBlocks([
                            'price' => fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])->pattern('₺price'),
                    ),
                TextInput::make('stock')
                    ->label('Stok Durumu')
                    ->numeric()
                    ->required(),
                TextInput::make('rate')
                    ->label('Görüntülenecek puan')
                    ->minValue(1)
                    ->maxValue(5)
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Ürün Adı')->sortable()->searchable(),
                TextColumn::make('Kategori.name')->label('Kategori Adı'),
                TextColumn::make('created_at')->label('Oluşturma Tarihi')->dateTime('d.m.Y H:i')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            KategoriRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUrunlers::route('/'),
            'create' => Pages\CreateUrunler::route('/create'),
            'edit' => Pages\EditUrunler::route('/{record}/edit'),
        ];
    }
}
