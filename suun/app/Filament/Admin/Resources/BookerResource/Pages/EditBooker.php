<?php

namespace App\Filament\Admin\Resources\BookerResource\Pages;

use App\Filament\Admin\Resources\BookerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBooker extends EditRecord
{
    protected static string $resource = BookerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
