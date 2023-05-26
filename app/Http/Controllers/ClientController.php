<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Retrieve clients from the database
        $clients = \App\Models\Client::all();

        // Return the view with the clients data
        return view('users.clients', compact('clients'));
    }

    public function edit($id)
{
    $client = Client::find($id);
    // You can pass the $client data to the view and handle the edit logic here
    return view('users.edit-client', ['client' => $client]);
}


    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'street' => 'required',
        'phone' => 'required',
    ]);

    // Create a new client instance
    $client = new Client();
    $client->name = $request->name;
    $client->email = $request->email;
    $client->address_street = $request->street;
    $client->phone_number = $request->phone;

    // Save the client in the database
    $client->save();

    // Redirect to a success page or any other desired action
    return redirect()->route('clients.index')->with('success', 'Client registered successfully.');
}

public function update(Request $request, $id)
{
    $client = Client::find($id);

    // Validate the input
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'street' => 'required',
        'phone' => 'required',
    ]);

    // Update the client data
    $client->name = $validatedData['name'];
    $client->email = $validatedData['email'];
    $client->address_street = $validatedData['street'];
    $client->phone_number = $validatedData['phone'];

    // Save the updated client
    $client->save();

    // Redirect to a success page or wherever you want
    return redirect()->route('clients.index')->with('success', 'Client updated successfully');
}



}
