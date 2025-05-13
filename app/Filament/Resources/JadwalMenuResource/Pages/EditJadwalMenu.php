<?php

namespace App\Filament\Resources\JadwalMenuResource\Pages;

use App\Filament\Resources\JadwalMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalMenu extends EditRecord
{
    protected static string $resource = JadwalMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
