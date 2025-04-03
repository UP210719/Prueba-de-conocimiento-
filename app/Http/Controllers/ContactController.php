<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Mostrar todos los contactos
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('contacts.create');
    }

    // Guardar nuevo contacto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:contacts,email'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contacto agregado exitosamente');
    }

    // Mostrar un contacto
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Mostrar formulario de edición
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Actualizar un contacto
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:contacts,email,' . $contact->id
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contacto actualizado exitosamente');
    }

    // Eliminar un contacto
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contacto eliminado exitosamente');
    }
}
