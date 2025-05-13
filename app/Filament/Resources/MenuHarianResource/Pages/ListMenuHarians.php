<?php

namespace App\Filament\Resources\MenuHarianResource\Pages;

use App\Filament\Resources\MenuHarianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuHarians extends ListRecords
{
    protected static string $resource = MenuHarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
