<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\MenuHarianResource\Pages;
use App\Filament\Resources\MenuHarianResource\RelationManagers;
use App\Models\MenuHarian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuHarianResource extends Resource
{
    protected static ?string $model = MenuHarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('jadwal_menu_id')
                ->relationship('jadwalMenu', 'nama_jadwal')
                ->required()
                ->label('Jadwal Menu'),

                TextInput::make('hari')
                    ->required()
                    ->label('Hari (ex: Senin, Selasa, dll)'),

                DatePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('jadwalMenu.nama_jadwal')->label('Jadwal'),
                TextColumn::make('hari'),
                TextColumn::make('tanggal')->label('tanggal')->date(),
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
            'index' => Pages\ListMenuHarians::route('/'),
            'create' => Pages\CreateMenuHarian::route('/create'),
            'edit' => Pages\EditMenuHarian::route('/{record}/edit'),
        ];
    }
}
