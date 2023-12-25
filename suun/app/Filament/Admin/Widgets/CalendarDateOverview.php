<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Calendar;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CalendarDateOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $dayAfterTomorrow = Carbon::tomorrow()->addDay()->format('Y-m-d');
// \gl::debug(now());
        return [
            Stat::make('今天', Calendar::query()->where('date', $today)->count()),
            Stat::make('明天', Calendar::query()->where('date', $tomorrow)->count()),
            Stat::make('後天', Calendar::query()->where('date', $dayAfterTomorrow)->count()),
        ];
    }
}
