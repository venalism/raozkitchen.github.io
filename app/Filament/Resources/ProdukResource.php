<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')
                ->required()
                ->label('Nama Produk'),

                TextInput::make('satuan')
                    ->required()
                    ->label('Satuan (ex: porsi, cup, pcs)'),

                TextInput::make('harga_default')
                    ->numeric()
                    ->required()
                    ->label('Harga Default'),

                Textarea::make('keterangan')
                    ->label('Keterangan (opsional)'),

                TextInput::make('jumlah_standar_unit')
                    ->numeric()
                    ->default(1)
                    ->label('Jumlah Standar'),

                Toggle::make('is_active')
                    ->label('Produk Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nama_produk')->searchable(),
                TextColumn::make('satuan'),
                TextColumn::make('harga_default')->money('IDR', true),
                TextColumn::make('jumlah_standar_unit'),
                TextColumn::make('keterangan')->limit(30),
                BooleanColumn::make('is_active')->label('Aktif'),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
