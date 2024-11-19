@extends('layouts.app')

@section('content')
<div>
    <h1>Crear Proyecto</h1>

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

    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
        </div>

        <div>
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
        </div>

        <div>
            <label for="fecha_fin">Fecha de Finalización:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
        </div>

        <div>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="En progreso" {{ old('estado') == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Completado" {{ old('estado') == 'Completado' ? 'selected' : '' }}>Completado</option>
                <option value="En espera" {{ old('estado') == 'En espera' ? 'selected' : '' }}>En espera</option>
            </select>
        </div>

        <div>
            <label for="presupuesto">Presupuesto:</label>
            <input type="number" name="presupuesto" id="presupuesto" step="0.01" value="{{ old('presupuesto') }}">
        </div>

        <div>
            <button type="submit">Guardar Proyecto</button>
            <a href="{{ route('proyectos.index') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
