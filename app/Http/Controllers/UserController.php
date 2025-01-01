<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MYid = auth()->user()->id;
        $users = User::where("id", '!=', $MYid)->get();
        return view("users.show_users", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::find($id);
        return view("users.users_permmesion", compact("users"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $upd = User::find($id);
        $upd->role = $request->role;
        $upd->save();
        session()->flash('update', 'Role was Deleted');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
