<?php

namespace App\Filament\Admin\Resources\Post;

use App\Filament\Admin\Resources\Post\ArticleResource\Pages;
use App\Filament\Admin\Resources\Post\ArticleResource\RelationManagers;
use App\Forms\Components\ColorPicker;
use App\Forms\Components\TinyMCE;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\trix;
use Filament\Forms\Components\ViewField;

//切換

class ArticleResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = '文章';
    protected static ?string $navigationIcon = 'gmdi-post-add-o';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('標題'),
                Forms\Components\TextInput::make('subtitle')
                    ->label('副標題')
                    ->nullable(),
                Forms\Components\Toggle::make('status')
                    ->onColor('success')
                    ->offColor('danger'),

                Forms\Components\FileUpload::make('image_path')
                    ->label('圖片上傳')
                    ->storeFileNamesIn('original_image_names')
                    ->imageEditor(),
                TinyMCE::make('content')
//                    ->required()
                    ->label('內容'),
            ])

//            ->statePath('data')
            ->columns(1); // 設置為兩列;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle'),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_path')

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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
