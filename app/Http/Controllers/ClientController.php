<?php

namespace App\Http\Controllers;

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
}
