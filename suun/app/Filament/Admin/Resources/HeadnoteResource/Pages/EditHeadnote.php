<?php

namespace App\Filament\Admin\Resources\HeadnoteResource\Pages;

use App\Filament\Admin\Resources\HeadnoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeadnote extends EditRecord
{
    protected static string $resource = HeadnoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\ViewAction::make(),
//            Actions\DeleteAction::make(),
        ];
    }
}
