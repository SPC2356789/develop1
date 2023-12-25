<?php

namespace App\Filament\Admin\Resources\SetTimeResource\Pages;

use App\Filament\Admin\Resources\SetTimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetTime extends EditRecord
{
    protected static string $resource = SetTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function afterSave(Page $page, $record): void
    {
        parent::afterSave($page, $record);

        // Redirect to the homepage after saving
        $page->redirect(url('/')); // 可能需要根據你的應用程序設定這裡的 URL
    }
}
