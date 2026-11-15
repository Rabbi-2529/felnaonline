<?php
// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Display all clients
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    // Show the form for creating a new client
    public function create()
    {
        return view('admin.clients.create');
    }

    // Store a newly created client
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        Client::newClient($request);

        return redirect()->route('clients.index')->with('success', 'Client added successfully!');
    }

    // Show the form for editing the specified client
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    // Update the specified client
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        Client::updateClient($request, $client);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    // Remove the specified client
    public function destroy(Client $client)
    {
        Client::deleteClient($client);
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }
}
