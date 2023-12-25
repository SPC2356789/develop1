<?php

namespace App\Filament\Admin\Resources\SetTimeResource\Pages;

use App\Filament\Admin\Resources\SetTimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSetTimes extends ListRecords
{
    protected static string $resource = SetTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
