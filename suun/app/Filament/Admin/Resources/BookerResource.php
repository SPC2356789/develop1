<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BookerResource\Pages;
use App\Filament\Admin\Resources\BookerResource\RelationManagers;
use App\Models\Booker;
use App\Models\zipcodes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookerResource extends Resource
{
    protected static ?string $model = Booker::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        $select_city = zipcodes::distinct()->pluck('city', 'city')->toArray();
//        $select_city = zipcodes::sele()->pluck('city')->toArray();
//        $select_city = zipcodes::pluck('city')->unique()->toArray();

//        \gl::debug($select_city);
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
//                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
//                    ->required()
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('名字')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('信箱')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('手機')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job')
                    ->label('工作')
                    ->searchable(),
                Tables\Columns\TextColumn::make('now_adr_city')
                    ->label('現居地')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->label('生日')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_birth')
                    ->label('出生地')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBookers::route('/'),
            'create' => Pages\CreateBooker::route('/create'),
            'edit' => Pages\EditBooker::route('/{record}/edit'),
        ];
    }
}
