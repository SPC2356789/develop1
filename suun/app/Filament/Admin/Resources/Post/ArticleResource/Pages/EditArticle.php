<?php

namespace App\Filament\Admin\Resources\Post\ArticleResource\Pages;

use App\Filament\Admin\Resources\Post\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;


class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function updateRecord($record, array $data)
    {
        // 在这里抓取修改的数据
        $updatedData = $data;

        // 其他逻辑...

        // 调用默认的更新记录方法
        parent::save($record, $data);
    }



}
