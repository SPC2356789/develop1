<?php

namespace App\Filament\Admin\Resources\BookerResource\Pages;

use App\Filament\Admin\Resources\BookerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooker extends CreateRecord
{
    protected static string $resource = BookerResource::class;
}
