@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Lista de Contactos</h1>
    
    <a href="{{ route('contactos.create') }}" class="btn btn-primary mb-3">Agregar Contacto</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->nombre }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->telefono }}</td>
                    <td>
                        <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este contacto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
