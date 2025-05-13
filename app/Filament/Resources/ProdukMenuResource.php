<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProdukMenuResource\Pages;
use App\Filament\Resources\ProdukMenuResource\RelationManagers;
use App\Models\ProdukMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukMenuResource extends Resource
{
    protected static ?string $model = ProdukMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('menu_harian_id')
                ->relationship('menuHarian', 'tanggal')
                ->label('Menu Harian (Tanggal)')
                ->required(),

                Select::make('produk_id')
                    ->relationship('produk', 'nama_produk')
                    ->label('Produk')
                    ->required(),

                TextInput::make('harga_menu')
                    ->numeric()
                    ->required()
                    ->label('Harga Spesial Hari Itu'),

                Textarea::make('keterangan_tambahan')
                    ->label('Catatan Tambahan (opsional)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('menuHarian.hari')->label('Hari'),
                TextColumn::make('menuHarian.tanggal')->label('Tanggal'),
                TextColumn::make('produk.nama_produk')->label('Nama Produk'),
                TextColumn::make('harga_menu')->label('Harga')->money('IDR', true),
                TextColumn::make('keterangan_tambahan')->limit(30),
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
            'index' => Pages\ListProdukMenus::route('/'),
            'create' => Pages\CreateProdukMenu::route('/create'),
            'edit' => Pages\EditProdukMenu::route('/{record}/edit'),
        ];
    }
}
