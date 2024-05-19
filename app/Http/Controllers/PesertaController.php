<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPeserta = User::where('role', 'peserta')->get();
        return view('admin.index-peserta', compact('dataPeserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-peserta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastUserId = User::max('id');
        $nextUserId = $lastUserId + 1;
        if($nextUserId>99){
            $nomorIndukz = 'SIS' . $nextUserId;
        }
        else if($nextUserId>9){
            $nomorIndukz = 'SIS0' . $nextUserId;
        }
        else{
            $nomorIndukz = 'SIS00' . $nextUserId;
        }
        
        User::create([
            'name' => $request->inputName,
            'nomorInduk' => $nomorIndukz,
            'email' => $request->inputEmail,
            'password' => Hash::make($request->inputPassword),
            'role' => $request->inputRole,
        ]);

        return redirect()->route('peserta.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataPeserta = User::where('id', $id)->first();
        return view('admin.show-peserta', compact('dataPeserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataPeserta = User::where('id', $id)->first();
        return view('admin.edit-peserta', compact('dataPeserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peserta = User::find($id);
        $peserta->name = $request->inputName;
        $peserta->email = $request->inputEmail;
        if($request->inputPassword != "-"){
            $peserta->password = $request->inputPassword;
        } 
        $peserta->save();

        return redirect()->route('peserta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = User::find($id);
        $peserta->delete();

        return redirect()->route('peserta.index');
    }
}
