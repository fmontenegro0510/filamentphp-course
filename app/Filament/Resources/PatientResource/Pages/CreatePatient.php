<?php

namespace App\Filament\Resources\PatientResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PatientResource;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;


    protected function getFormActions(): array
    {
        return array_merge(parent::getFormActions(), [
            Actions\Action::make('Borrar campos')
                    ->action(function () {
                        //para reiniciar todo el form
                        // $this->form->fill();
                        //Para reiniciar campos especificos
                        $this->reset('data.name', 'data.type', 'data.owner_id');
                        //La otra opcion es haciendo uso de la opcion Set, tambien sirve para el caso de tener fomularios largos setear algunos valores para probar, sin ejecutar un caso de Testing
                        //$set('data.name', '',);
                        //$set('data.slug', '',);
                        //$set('data.description', '');
                        Notification::make() 
                            ->title('De una prro se ha limpiado el formulario')
                            ->success()
                            ->send(); 
                    })
            ],
        );
    }
}
