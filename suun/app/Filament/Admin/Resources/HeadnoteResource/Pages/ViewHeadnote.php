<?php

namespace App\Filament\Admin\Resources\HeadnoteResource\Pages;

use App\Filament\Admin\Resources\HeadnoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeadnote extends ViewRecord
{
    protected static string $resource = HeadnoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
