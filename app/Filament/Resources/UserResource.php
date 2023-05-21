<?php

namespace App\Filament\Resources;

use App\Models\User;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\CheckboxList;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'Kullanıcı';
    protected static ?string $pluralModelLabel = 'Kullanıcılar';
    protected static ?string $navigationGroup = 'Yönetim';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Ad Soyad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Şifre')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(static fn(null|string $state):
                        null|string =>
                        filled($state) ? Hash::make($state): null,
                    )
                    ->required(static fn(Page $livewire): string =>
                        $livewire instanceof CreateUser,
                    )
                    ->dehydrated(static fn(null|string $state): bool =>
                        filled($state),
                    )
                    ->label(static fn(Page $livewire): string =>
                        ($livewire instanceof EditUser) ? 'Yeni Şifre' : 'Şifre',
                    ),
                Forms\Components\Toggle::make('is_admin')->required(),
                CheckboxList::make('roles')->relationship('roles', 'name')->columns(2)->helperText('Sadece birini seçiniz')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('roles.name')->sortable()->searchable(),
                Tables\Columns\IconColumn::make('is_admin')->boolean()->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('d.m.Y H:i')->sortable()->searchable(),
                TextColumn::make('deleted_at')->dateTime('d.m.Y H:i')->sortable()->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RolesRelationManager::class,
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
