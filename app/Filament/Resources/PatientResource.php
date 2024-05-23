<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\PatientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\PatientResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;




class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options([
                        'cat' => 'Cat',
                        'dog' => 'Dog',
                        'rabbit' => 'Rabbit',
                    ])
                    ->required(),
                DatePicker::make('date_of_birth')
                ->required()
                    ->maxDate(now()),
                Select::make('owner_id')
                ->relationship('owner', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Phone number')
                            ->tel()
                            ->required(),
                    ])
                    ->required(),
                    FileUpload::make('foto')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->avatar()
                    ->moveFiles()
     
                    ->getUploadedFileNameForStorageUsing(
                        fn (Get $get): string => $get('name') ."-". $get('owner_id').".png",
                    )  

                    ->directory('Pepo')               
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                ->circular(),
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('type'),
                TextColumn::make('date_of_birth')
                ->sortable(),
                TextColumn::make('owner.name')
                ->searchable(),
            ])
            ->filters([
                SelectFilter::make('type')
                ->options([
                    'cat' => 'Cat',
                    'dog' => 'Dog',
                    'rabbit' => 'Rabbit',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                ]),
               
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TreatmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'view' => Pages\ViewPatient::route('/{record}'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
            

        ];
    }
}
