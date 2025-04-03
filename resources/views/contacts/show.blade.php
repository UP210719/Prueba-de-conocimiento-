@extends('layouts.app')

@section('content')
    <h1>Detalles del Contacto</h1>
    <p><strong>Nombre:</strong> {{ $contact->name }}</p>
    <p><strong>Teléfono:</strong> {{ $contact->phone }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>

    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Volver</a>
@endsection
