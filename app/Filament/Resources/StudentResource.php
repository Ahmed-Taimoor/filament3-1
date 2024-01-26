<?php

namespace App\Filament\Resources;

use App\Enums\Semester;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\Pages\ViewStudent;
use Filament\Infolists\Components\Component;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Student::getFrom());
    }

    public static function infoList(Infolist $infolist): InfoList
    {
        return $infolist
            ->schema(
                [
                    Section::make('Personal Information')
                        ->columns(3)
                        ->schema(
                            [
                                ImageEntry::make('image')
                                    ->circular(),
                                TextEntry::make('name'),
                                TextEntry::make('email'),
                                TextEntry::make('semester'),
                                TextEntry::make('session'),
                                TextEntry::make('admission_date'),
                                TextEntry::make('contact_number'),
                                TextEntry::make('portal_username'),
                                TextEntry::make('course_id'),


                            ])
                ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('session')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('admission_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('portal_username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
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
            RelationManagers\CourseRelationManager::class,
        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
//            'edit' => Pages\EditStudent::route('/{record}/edit'),
            'view' => Pages\ViewStudent::route('/{record}/'),
        ];
    }
}
