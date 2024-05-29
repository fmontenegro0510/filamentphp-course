

{{-- {{dd($record)}} --}}
{{-- <div class="id">
    <img src="{{ asset($record->foto) }}" alt="Foto de {{$record->name}}" />    
</div> --}}
{{-- <img src="{{ asset($record->foto) }}" alt="Foto de {{$record->name}}" />     --}}
{{-- <img src="'. public_path() .'{{$record->foto}}"> --}}
{{-- <img src="data:image/png;base64, {!! base64_encode(file_get_contents('{{ $record->foto }}')) !!}" width="100" height="100"> --}}
{{-- dd({{ public_path() .'/'. $record->foto}}); --}}
{{-- dd({{url($record->foto)}}); --}}
{{-- <img src="{{url($record->foto)}}" alt="Foto de {{$record->name}}" />     --}}
{{-- dd('app/public/{{ $record->foto }}'); --}}
{{-- <img src=" public_path('{{$record->foto}}') " style="width: 20%">
<img src="app/public/{{ $record->foto }}" alt="" height="100" alt="Foto de {{$record->name}}"> --}}

{{-- <img src=" storage_path('app/public/'. {{$record->foto}})" style="width: 20%"> --}}
{{-- {{dd(url('app/public/'. $record->foto))}}. --}}
{{-- 
<img src="" height="100" > --}}

{{-- {{dd(url('app/public/'. $record->foto))}} --}}
{{-- {{dd(asset( $record->foto))}} --}}
{{-- {{dd(URL::asset('app/public/'.$record->foto))}} --}}

{{-- <img src="{{URL::asset('app/public/'.$record->foto)}}" height="200" width="200"> --}}
{{-- {{dd(public_path($record->foto))}} --}}
{{-- <img src="{{ public_path($record->foto) }}" style="width: 20%"> --}}



<div>ID: {{ $record->id }}</div>
<div>Name: {{ $record->name }}</div>
<div>Fecha de Nacimiento: {{ $record->date_of_birth }}</div>
<div>Tipo: {{ $record->type }}</div>

@if (is_null($record->informe) )
<div> No contiene Datos Adjuntos</div>
@else
<div> 
    <a href='{{$record->informe}}' download='{{$record->name}} - Informe'>Descargar Documento</a>
</div>
@endif
<div>Dueño: {{ $record->owner->name }}</div>
<div>Email: {{ $record->owner->email }}</div>
<div>Phone: {{ $record->owner->phone }}</div>


<div>
    <table>
        <tr>
            <th>Descripcion</th>
            <th>Notas</th>
            <th>Precio</th>
        </tr>
        <tr class="items">
            @foreach($record->treatments as $item)
                <td>
                    {{ $item['description'] }}
                </td>
                <td>
                    {{ $item['price'] }}
                </td>
                <td>
                    {{ $item['notes'] }}
                </td>
            @endforeach
        </tr>
    </table>
</div>

<div>Fecha Creacion: {{ $record->created_at }}</div>
<div>Fecha Actualizacion: {{ $record->updated_at }}</div>
