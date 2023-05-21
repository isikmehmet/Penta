<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategorilerResource\Pages;
use App\Filament\Resources\KategorilerResource\RelationManagers;
use App\Models\KategoriModel as Kategoriler;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategorilerResource extends Resource
{
    protected static ?string $model = Kategoriler::class;
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategoriler';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Kategori Adı')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('d.m.Y H:i')->sortable()->searchable(),
                TextColumn::make('deleted_at')->dateTime('d.m.Y H:i')->sortable()->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategorilers::route('/'),
            'create' => Pages\CreateKategoriler::route('/create'),
            'edit' => Pages\EditKategoriler::route('/{record}/edit'),
        ];
    }
}
