<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Postulante;

use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostulanteResource\Pages;
use App\Filament\Resources\PostulanteResource\RelationManagers;

class PostulanteResource extends Resource
{
    protected static ?string $model = Postulante::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('apellido')
                ->minLength(2)
                ->maxLength(255)
                ->required(),
                TextInput::make('nombre')
                ->minLength(2)
                ->maxLength(255)
                ->required(),
                TextInput::make('dni')
                ->numeric()
                ->integer()
                ->minValue(1)
                ->maxValue(99999999)
                ->required(),
                DatePicker::make('fecha_nacimiento')
                ->required()
                ->maxDate(now()),
                TextInput::make('lugar_nacimiento')
                ->maxLength(255)
                ->required(),
                TextInput::make('domicilio')
                ->maxLength(255)
                ->required(),
                TextInput::make('localidad')
                ->maxLength(255)
                ->required(),
                TextInput::make('email')
                ->maxLength(255)
                ->required(),
                TextInput::make('telefono')
                ->maxLength(255)
                ->required(),
                TextInput::make('foto_postulante')
                ->maxLength(255)
                ->required(),
                Select::make('estado_civil')
                ->options([
                    'no especifica' => 'No Especifica',
                    'soltero/a' => 'Soltero/a',
                    'casado/a' => 'Casado/a',
                    'divorciado/a' => 'Divorciado/a',
                    'viudo/a' => 'Viudo/a',
                ])                
                ->columnSpan('sm')
                ->required(),
                TextInput::make('nacionalidad')
                ->maxLength(255)
                ->required(),
                TextInput::make('cargo_ocupa')
                ->maxLength(255),
                DatePicker::make('antiguedad')
                ->maxDate(now()),
                DatePicker::make('buena_conducta')
                ->maxDate(now()),
                ToggleButtons::make('certificado_domicilio')
                ->boolean()
                ->inline(),
                ToggleButtons::make('foto')
                ->boolean()
                ->inline(),
                ToggleButtons::make('informacion_sumaria')
                ->boolean()
                ->inline(),
                DatePicker::make('matricula')
                ->maxDate(now()),
                DatePicker::make('psicofisico')
                ->maxDate(now()),
                DatePicker::make('redam')
                ->maxDate(now()),
                DatePicker::make('rupv')
                ->maxDate(now()),
                DatePicker::make('sanciones')
                ->maxDate(now()),
                ToggleButtons::make('titulo_autenticado')
                ->boolean()
                ->inline()                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('documentaciones')
            ->columns([
               TextColumn::make('apellido'),
               TextColumn::make('nombre'),
               TextColumn::make('dni'),
               TextColumn::make('email'),
               TextColumn::make('foto_postulante'),
               
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
            'index' => Pages\ListPostulantes::route('/'),
            'create' => Pages\CreatePostulante::route('/create'),
            'edit' => Pages\EditPostulante::route('/{record}/edit'),
        ];
    }
}
