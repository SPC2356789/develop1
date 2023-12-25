<?php

namespace App\Filament\Admin\Resources\Post\ArticleResource\Pages;

use App\Filament\Admin\Resources\Post\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}
