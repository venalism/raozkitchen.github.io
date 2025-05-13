<?php

namespace App\Filament\Resources\JadwalMenuResource\Pages;

use App\Filament\Resources\JadwalMenuResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJadwalMenu extends CreateRecord
{
    protected static string $resource = JadwalMenuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set created_by dari user yang sedang login
        $data['created_by'] = auth()->id();
        return $data;
    }
}
