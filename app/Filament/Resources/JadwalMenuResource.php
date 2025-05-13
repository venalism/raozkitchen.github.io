<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\JadwalMenuResource\Pages;
use App\Filament\Resources\JadwalMenuResource\RelationManagers;
use App\Models\JadwalMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalMenuResource extends Resource
{
    protected static ?string $model = JadwalMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama_jadwal')->required(),
            DatePicker::make('tanggal_mulai')->required(),
            DatePicker::make('tanggal_selesai')->required(),
    
            FileUpload::make('poster_url')
                ->label('Upload Poster')
                ->directory('posters')
                ->image()
                ->hint('Boleh diupload untuk pemindaian OCR (opsional)'),
    
            Repeater::make('menuHarians')
                ->relationship()
                ->label('Menu Harian')
                ->schema([
                    TextInput::make('hari')->required(),
                    DatePicker::make('tanggal')->required(),
    
                    Repeater::make('produkMenus')
                        ->relationship()
                        ->label('Produk Menu')
                        ->schema([
                            Select::make('produk_id')
                                ->relationship('produk', 'nama_produk')
                                ->searchable()
                                ->preload()
                                ->label('Produk')
                                ->createOptionForm([
                                    TextInput::make('nama_produk')->required(),
                                    TextInput::make('satuan')->required(),
                                    TextInput::make('harga_default')->numeric()->required(),
                                    Textarea::make('keterangan'),
                                    TextInput::make('jumlah_standar_unit')->numeric()->default(1),
                                ]),
    
                            TextInput::make('harga_menu')->numeric()->required(),
                            Textarea::make('keterangan_tambahan'),
                        ])
                ])
        ]);
    }    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('nama_jadwal')->searchable(),
                TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date(),
                TextColumn::make('tanggal_selesai')->label('Tanggal Selesai')->date(),
                TextColumn::make('user.name')->label('Dibuat oleh'),
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
            'index' => Pages\ListJadwalMenus::route('/'),
            'create' => Pages\CreateJadwalMenu::route('/create'),
            'edit' => Pages\EditJadwalMenu::route('/{record}/edit'),
        ];
    }
}
