<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HolidayResource\Pages;
use App\Filament\Admin\Resources\HolidayResource\RelationManagers;
use App\Models\Holiday;
use App\Models\SetTime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;

class HolidayResource extends Resource
{
    protected static ?string $model = Holiday::class;


    protected static ?string $navigationIcon = 'gmdi-holiday-village-o';
    protected static ?string $navigationLabel = '公休日';
    protected static ?string $modelLabel = '公休日';

    public static function form(Form $form): Form
    {

        $time_range = SetTime::selectRaw('CONCAT(start_time, "-", end_time) AS time_range, id')->pluck('time_range', 'time_range')->toArray();
// 将每个值包裹在 [] 中
        $resultArray = array_map(function ($value) {
            return $value;
        }, $time_range);

        $resultString = implode(',', $resultArray);
//        \gl::debug($resultString);
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('選擇日期')
                    ->format('Y-m-d') // 指定日期格式
                    ->default(now()), // 使用 now() 函數設置預設日期為今天
                Forms\Components\TagsInput::make('time_point')
                    ->separator(',')
                    ->reorderable()
                    ->suggestions($time_range)
                    ->default($resultString)
            ]);
    }

    public static function table(Table $table): Table
    {
        Grid::make([
            'lg' => 2,
            '2xl' => 5,
        ]);
        return $table
            ->columns([
                Split::make([
                    Tables\Columns\TextColumn::make('date')
                        ->searchable(),
                ]),
                Panel::make([
                    Tables\Columns\TextColumn::make('time_point')
                        ->searchable()
                ])->collapsed(false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHolidays::route('/'),
            'create' => Pages\CreateHoliday::route('/create'),
            'edit' => Pages\EditHoliday::route('/{record}/edit'),
        ];
    }
}
