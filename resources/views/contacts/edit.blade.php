@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">{{ isset($contacto) ? 'Editar Contacto' : 'Agregar Contacto' }}</h2>

    <form action="{{ isset($contacto) ? route('contactos.update', $contacto->id) : route('contactos.store') }}" method="POST">
        @csrf
        @if(isset($contacto))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ isset($contacto) ? $contacto->nombre : old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ isset($contacto) ? $contacto->email : old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ isset($contacto) ? $contacto->telefono : old('telefono') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($contacto) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('contactos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
