<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User registered successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // You can pass the $user data to the view and handle the edit logic here
        return view('users.edit-user', ['user' => $user]);
        //return view('users.edit-user');
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->status = $request->status;
        //$user->status = 0;
        $user->save();

        // Redirect to a success page or wherever you want
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function restore(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->status = $request->status;
        //$user->status = 0;
        $user->save();

        // Redirect to a success page or wherever you want
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // Validate the input
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        ]);

        // Update the user data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Save the updated user
        $user->save();

        // Redirect to a success page or wherever you want
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
