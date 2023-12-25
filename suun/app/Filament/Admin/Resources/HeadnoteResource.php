<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HeadnoteResource\Pages;
use App\Filament\Admin\Resources\HeadnoteResource\RelationManagers;
use App\Forms\Components\TinyMCE;
use App\Models\Headnote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
//use Filament\Tables\Columns\Layout\Grid;

use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
class HeadnoteResource extends Resource
{
    protected static ?string $model = Headnote::class;

    protected static ?string $navigationLabel = '標頭備註';
    protected static ?string $modelLabel = '標頭備註';
    protected static ?string $navigationIcon = 'gmdi-edit-note-o';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TinyMCE::make('note')
                    ->label('內容'),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table

            ->columns([
                Panel::make([
                    Split::make([
                        TextColumn::make('note')
                    ])->from('md'),
                ])->collapsed(false)
//                Tables\Columns\TextColumn::make('note'),
//                    ->searchable(),
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->filters([
                //
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
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
            'index' => Pages\ListHeadnotes::route('/'),
//            'create' => Pages\CreateHeadnote::route('/create'),
            'view' => Pages\ViewHeadnote::route('/{record}'),
            'edit' => Pages\EditHeadnote::route('/{record}/edit'),
//            'default' => Pages\EditHeadnote::route('/1/edit'), // 添加默认路由
        ];
    }
}
