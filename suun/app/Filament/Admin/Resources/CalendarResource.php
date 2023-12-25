<?php

namespace App\Filament\Admin\Resources;

use App\Models\SetTime;
use App\Filament\Admin\Resources\CalendarResource\Pages;
use App\Filament\Admin\Resources\CalendarResource\RelationManagers;
use App\Models\Calendar;

use App\Models\zipcodes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class CalendarResource extends Resource
{

    protected static ?string $model = Calendar::class;
    protected static ?string $navigationIcon = 'heroicon-m-calendar-days';
    protected static ?string $navigationLabel = '預約';
    protected static ?string $modelLabel = '預約';


    public static function form(Form $form): Form
    {
        $time_range = SetTime::selectRaw('CONCAT(start_time, "-", end_time) AS time_range, id')->pluck('time_range', 'time_range')->toArray();
        $select_city = zipcodes::distinct()->pluck('city', 'city')->toArray();
        //\gl::debug($time_range);
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('選擇日期')
                    ->format('Y-m-d') // 指定日期格式
                    ->default(now()), // 使用 now() 函數設置預設日期為今天
                Forms\Components\Select::make('time')
                    ->required()
                    ->options($time_range)
                    ->label('預約時間範圍')
                    ->default(1), // 設置預設顏,
                Forms\Components\TextInput::make('text')
                    ->label('預約備註'),
                Forms\Components\ColorPicker::make('bcolor')
                    ->label('備註背景色')
                    ->default('#777888'), // 設置預設顏色
                Forms\Components\ColorPicker::make('tcolor')
                    ->label('備註文字色')
                    ->default('#ffffff'), // 設置預設顏色
                Forms\Components\Select::make('booker_id')
                    ->relationship('booker', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('job')
//                    ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('now_adr_city')
                            ->options($select_city)
                            ->default('台北市')
                        ,
                        Forms\Components\DatePicker::make('birthday')
                        ,
                        Forms\Components\Select::make('place_of_birth')
                            ->default('台北市')
                            ->options($select_city)
                        ,
                    ])
            ])
            ->columns(3); // 設置為兩列'
//        \gl::debug($form);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('預約日')
                    ->sortable(),//排列
                Tables\Columns\TextColumn::make('time')
                    ->label('時間')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booker.name')
                    ->label('預約者')
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label('時段備註')
                    ->searchable(),

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
            'index' => Pages\ListCalendars::route('/'),
            'create' => Pages\CreateCalendar::route('/create'),
            'edit' => Pages\EditCalendar::route('/{record}/edit'),
        ];
    }
}
