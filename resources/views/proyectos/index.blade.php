@extends('layouts.app')

@section('content')
<div>
   <h1>PROYECTOS</h1>

<hr>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Presupuesto</th>
                <th>Estado</th>
               
            </tr>
        </thead>
       
        <tbody>
            @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->descripcion }}</td>
                <td>{{ $proyecto->fecha_inicio }}</td>
                <td>{{ $proyecto->fecha_fin }}</td>
                <td>{{ $proyecto->presupuesto }}</td>
                <td>{{ $proyecto->estado }}</td>
                <td>
                   <button> <a href="{{ route('proyectos.edit', $proyecto->id) }}">Editar</a></button>
                   <hr>
                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        

    </table>
    <hr>
    <button> <a href="{{ route('proyectos.create') }}">Crear Proyecto</a></button>
</div>
@endsection
