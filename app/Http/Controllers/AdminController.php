<?php

namespace App\Http\Controllers;

use App\Models\KelasUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelas;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAdmin = User::where('role', 'admin')->get();
        return view('admin.index-admin', compact('dataAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastUserId = User::max('id');
        $nextUserId = $lastUserId + 1;
        if($nextUserId>99){
            $nomorIndukz = 'ADM' . $nextUserId;
        }
        else if($nextUserId>9){
            $nomorIndukz = 'ADM0' . $nextUserId;
        }
        else{
            $nomorIndukz = 'ADM00' . $nextUserId;
        }
        
        User::create([
            'name' => $request->inputName,
            'nomorInduk' => $nomorIndukz,
            'email' => $request->inputEmail,
            'password' => Hash::make($request->inputPassword),
            'role' => $request->inputRole,
        ]);
        
        $daftarKelas = Kelas::all();
        foreach($daftarKelas as $d){
            KelasUser::create([
                'user_id' => $nextUserId,
                'kelas_id' => $d->id,
                'role' => "admin"
            ]);
        }


        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataAdmin = User::where('id', $id)->first();
        return view('admin.show-admin', compact('dataAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataAdmin = User::where('id', $id)->first();
        return view('admin.edit-admin', compact('dataAdmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::find($id);
        $admin->name = $request->inputName;
        $admin->email = $request->inputEmail;
        if($request->inputPassword != "-"){
            $admin->password = $request->inputPassword;
        } 
        $admin->save();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admin.index');
    }
}
