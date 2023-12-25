<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Calendar;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
class CalendarChart extends ChartWidget
{
    protected static ?string $heading = '月預約數';

    protected static ?int $sort = 2;
    protected function getData(): array
    {
//        $trend = new Trend(Calendar::class);
//        $trend->setDateColumn('your_custom_date_column');
        $data = Trend::model(Calendar::class)
            ->dateColumn('date')
            ->between(
                start: now()->startOfMonth(), // 本月的開始日期
                end: now()->endOfMonth() // 本月的結束日期
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => '預約數',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
