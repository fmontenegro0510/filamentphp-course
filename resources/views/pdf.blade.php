<h3>Ficha Postulante</h3>
<p>&nbsp;</p>

<img src="storage/{{ $record->foto }}" alt="{{$record->name}}" height="200" width="200" >

<p><u>Nombre y Apellido:</u><strong> </strong><i><strong>{{ $record->name }}</strong></i></p>
<p><u>Fecha de Nacimiento:</u> <strong>{{ $record->date_of_birth }}</strong></p>
<p><u>Tipo:</u> <strong>{{ $record->type }}</strong></p>
<p>&nbsp;</p>
<p><strong>Datos Adjuntos:&nbsp;</strong></p>
<ul>
    <li>

        @if (is_null($record->informe) )
        <div> No contiene Datos Adjuntos</div>
        @else
        <div> 
            <a href='{{$record->informe}}' download='{{$record->name}} - Informe'>Descargar Documento</a>
        </div>
        @endif

    </li>
</ul>
<p>&nbsp;</p>
<p><strong>Dueño:</strong></p>
<p style="margin-left:40px;"><strong>Nombre:</strong> {{ $record->owner->name }}</p>
<p style="margin-left:40px;"><strong>Email:</strong>{{ $record->owner->email }}</p>
<p style="margin-left:40px;"><strong>Telefono:</strong>{{ $record->owner->phone }}</p>
<p style="margin-left:40px;">&nbsp;</p>
<h3><strong>Tratamientos</strong></h3>

<figure class="table">
    <table style="border-color:hsl(0, 0%, 0%);border-style:solid;">
        <thead>
            <tr>
                <th style="border-color:hsl(0, 0%, 30%);border-style:solid;">Descripcion</th>
                <th style="border-color:hsl(0, 0%, 30%);border-style:solid;">Notas</th>
                <th style="border-color:hsl(0, 0%, 30%);border-style:solid;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($record->treatments as $item)
                <tr class="items" style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                    <td style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                        {{ $item['description'] }}
                    </td style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                    <td style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                        {{ $item['price'] }}
                    </td style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                    <td style="border-color:hsl(0, 0%, 30%);border-style:solid;">
                        {{ $item['notes'] }}
                    </td>
                </tr>
            @endforeach            
        </tbody>
    </table>
    </table>
</figure>

<div>Fecha Creacion: {{ $record->created_at }}</div>
<div>Fecha Actualizacion: {{ $record->updated_at }}</div>
