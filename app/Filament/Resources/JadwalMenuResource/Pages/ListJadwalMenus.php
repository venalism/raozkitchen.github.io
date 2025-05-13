<?php

namespace App\Filament\Resources\JadwalMenuResource\Pages;

use App\Filament\Resources\JadwalMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalMenus extends ListRecords
{
    protected static string $resource = JadwalMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
