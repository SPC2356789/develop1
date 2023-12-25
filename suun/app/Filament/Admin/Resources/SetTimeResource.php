<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SetTimeResource\Pages;
use App\Filament\Admin\Resources\SetTimeResource\RelationManagers;
use App\Models\SetTime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\text;

class SetTimeResource extends Resource
{
    protected static ?string $model = SetTime::class;
    protected static ?string $navigationLabel = '時段設定';
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('start_time')
                    ->type('time')
                    ->label('Start Time'),
                Forms\Components\TextInput::make('end_time')
                    ->type('time')
                    ->label('End Time'),
            ])
            ->columns(5); // 設置為兩列;

    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSetTimes::route('/'),
            'create' => Pages\CreateSetTime::route('/create'),
            'edit' => Pages\EditSetTime::route('/{record}/edit'),
        ];
    }
}
