<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get(); // Mendapatkan semua data pengguna

        return view('pages.admin.user.index', compact('users'));
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
        //
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
        $user = User::findOrFail($id); // Mendapatkan data pengguna berdasarkan ID

        return view('pages.admin.user.edit', compact('user'));
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
        $request->validate([
            'roles' => 'required|string|in:ADMIN,USER',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->save();
    
        if ($user) {
            return redirect()->route('dashboard.user.index')
                ->with('success', 'Data pengguna berhasil diupdate');
        } else {
            return redirect()->route('dashboard.user.index')
                ->with('error', 'Data pengguna gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user -> delete();

        return redirect()->route('dashboard.user.index')->with('success', 'Data user berhasil dihapus');
    }
}