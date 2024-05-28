<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMentor = User::where('role', 'mentor')->get();
        return view('admin.index-mentor', compact('dataMentor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKelas = Kelas::all();
        return view('admin.tambah-mentor', compact('daftarKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastUserId = User::max('id');
        $nextUserId = $lastUserId + 1;
        if($nextUserId>99){
            $nomorIndukz = 'MTR' . $nextUserId;
        }
        else if($nextUserId>9){
            $nomorIndukz = 'MTR0' . $nextUserId;
        }
        else{
            $nomorIndukz = 'MTR00' . $nextUserId;
        }
        
        User::create([
            'name' => $request->inputName,
            'nomorInduk' => $nomorIndukz,
            'email' => $request->inputEmail,
            'password' => Hash::make($request->inputPassword),
            'role' => $request->inputRole,
            'id_kelas_ajar' => $request->inputKelas
        ]);

        return redirect()->route('mentor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataMentor = User::where('id', $id)->first();
        return view('admin.show-mentor', compact('dataMentor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataMentor = User::where('id', $id)->first();
        $daftarKelas = Kelas::all();
        return view('admin.edit-mentor', compact('dataMentor', 'daftarKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentor = User::find($id);
        $mentor->name = $request->inputName;
        $mentor->email = $request->inputEmail;
        if($request->inputPassword != "-"){
            $mentor->password = $request->inputPassword;
        } 
        if($request->inputKelas != "-"){
            $mentor->id_kelas_ajar = $request->inputKelas;
        }
        $mentor->save();

        return redirect()->route('mentor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentor = User::find($id);
        $mentor->delete();

        return redirect()->route('mentor.index');
    }
}
