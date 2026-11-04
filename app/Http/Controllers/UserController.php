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
        $dataUser = User::all();
        return view('user.index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'nullable|string|max:20',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|in:Male,Female,Other',
        ]);


        
        // Menggabungkan first_name dan last_name untuk mengisi kolom 'name' bawaan tabel users
        $data = $request->all();
        $data['name'] = $request->first_name . ' ' . $request->last_name;


        $data['password'] = bcrypt('password123');
        
        User::create($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email,' . $id,
            'phone'      => 'nullable|string|max:20',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|in:Male,Female,Other',
        ]);

        $user = User::findOrFail($id);
        
        $data = $request->all();
        $data['name'] = $request->first_name . ' ' . $request->last_name;

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus!');
    }
}