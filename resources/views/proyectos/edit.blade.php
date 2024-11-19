@extends('layouts.app')

@section('content')
<div>
    <h1>Editar Proyecto</h1>

    @if ($errors->any())
        <div>
            <strong>¡Ups! Algo salió mal:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion', $proyecto->descripcion) }}</textarea>
        </div>

        <div>
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" required>
        </div>

        <div>
            <label for="fecha_fin">Fecha de Finalización:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $proyecto->fecha_fin) }}">
        </div>

        <div>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="En progreso" {{ old('estado', $proyecto->estado) == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Completado" {{ old('estado', $proyecto->estado) == 'Completado' ? 'selected' : '' }}>Completado</option>
                <option value="En espera" {{ old('estado', $proyecto->estado) == 'En espera' ? 'selected' : '' }}>En espera</option>
            </select>
        </div>

        <div>
            <label for="presupuesto">Presupuesto:</label>
            <input type="number" name="presupuesto" id="presupuesto" step="0.01" value="{{ old('presupuesto', $proyecto->presupuesto) }}">
        </div>

        <div>
            <button type="submit">Actualizar Proyecto</button>
            <a href="{{ route('proyectos.index') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
