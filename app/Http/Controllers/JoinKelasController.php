<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use Auth;
use App\Models\KelasUser;
use App\Models\Material;
use App\Models\MulaiQuiz;

class JoinKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarKelas = Kelas::all();
        return view('list-kelas', compact('daftarKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        $user = User::where('id', $userID)->first();
        $role = $user->role;
        
        KelasUser::create([
            'user_id' => $userID,
            'kelas_id' => $request-> inputKelas,
            'role' => $role,
        ]);
        return redirect()->route('detail-kelas.show', ['id' => $request->inputKelas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataKelas = Kelas::where('id', $id)->first();
        // return view('detail-kelas', compact('dataKelas'));
        $user = Auth::user();
    
        $hasJoined = false;
        if ($user) {
            $hasJoined = KelasUser::where('user_id', $user->id)
                                ->where('kelas_id', $id)
                                ->exists();
        }
        
        $daftarMateri = Material::where('class_id', $id)->get();

        $daftarMentor = KelasUser::where('kelas_id', $id)->where('role', "mentor")->get();
        if($user){
            $udahUjian = MulaiQuiz::where('user_id', $user->id)->where('quiz_id', $id)->exists();
        }
        else{
            $udahUjian = false;
        }

        return view('detail-kelas', compact('dataKelas', 'hasJoined', 'daftarMateri', 'daftarMentor', 'udahUjian'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
