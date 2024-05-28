<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalQuiz;
use App\Models\Kelas;
class SoalQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataQuiz = SoalQuiz::all();
        return view('quiz.index-soal', compact('dataQuiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKelas = Kelas::all();
        return view('quiz.tambah-soal', compact('daftarKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SoalQuiz::create([
            'kelas_id' => $request->inputNamaKelas,
            'soal' => $request->inputSoal,
            'opsi1' => $request->inputOpsi1,
            'opsi2' => $request->inputOpsi2,
            'opsi3' => $request->inputOpsi3,
            'opsi4' => $request->inputOpsi4,
            'opsibenar' => $request->inputOpsiBenar,
        ]);

        return redirect()->route('soal.index');
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
        $dataSoal = SoalQuiz::where('id', $id)->first();
        $daftarKelas = Kelas::all();
        return view('quiz.edit-soal', compact('dataSoal', 'daftarKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $soal = SoalQuiz::find($id);
        $soal->kelas_id = $request->inputNamaKelas;
        $soal->soal = $request->inputSoal;
        $soal->opsi1 = $request->inputOpsi1;
        $soal->opsi2 = $request->inputOpsi2;
        $soal->opsi3 = $request->inputOpsi3;
        $soal->opsi4 = $request->inputOpsi4;
        $soal->opsibenar = $request->inputOpsiBenar;
        $soal->save();

        return redirect()->route('soal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soal = SoalQuiz::find($id);
        $soal->delete();

        return redirect()->route('soal.index');
    }
}
