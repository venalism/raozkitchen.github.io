<?php

namespace App\Filament\Resources\ProdukMenuResource\Pages;

use App\Filament\Resources\ProdukMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukMenus extends ListRecords
{
    protected static string $resource = ProdukMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
