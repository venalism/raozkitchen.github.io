<?php

namespace App\Filament\Resources;

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
                TextInput::make('nama_jadwal')
                ->required()
                ->maxLength(255)
                ->label('Nama Jadwal Menu'),

                DatePicker::make('tanggal_mulai')
                    ->required()
                    ->label('Tanggal Mulai'),

                DatePicker::make('tanggal_selesai')
                    ->required()
                    ->after('tanggal_mulai')
                    ->label('Tanggal Selesai'),
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
