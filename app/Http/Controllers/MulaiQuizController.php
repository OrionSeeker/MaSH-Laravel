<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\SoalQuiz;
use App\Models\MulaiQuiz;
use App\Models\Sertifikat;
use Auth;
class MulaiQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $userID = Auth::user()->id;

        foreach ($request->input('inputJawaban', []) as $soalId => $jawaban) {
            $soal = SoalQuiz::find($soalId);

            // Cek jawabannya bener atau engga
            $skor = ($soal && $soal->opsibenar == $jawaban) ? 10 : 0;

            MulaiQuiz::create([
                'user_id' => $userID,
                'quiz_id' => $request->inputKelas,
                'soal_id' => $soalId,
                'skor' => $skor
            ]);
        }
            $totalSkor = MulaiQuiz::where('user_id', $userID)->where('quiz_id', $request->inputKelas)->sum('skor');

            $url = null;
            if($totalSkor>=20){
                // $certiController = new CertificateController;
                // $certiController->generateCertificate(Auth::user()->name);
                $url = 'assets/sertifikat/' . Auth::user()->name;
            }
    
            Sertifikat::create([
                'user_id' => $userID,
                'kelas_id' => $request->inputKelas,
                'skor' => $totalSkor,
                'url' => $url
            ]);
        return redirect()->route('detail-kelas.show', ['id' => $request->inputKelas]);
        // return redirect()->route('mulai-kuis.hasil', ['id' => $request->inputKelas] );

        // $soal = SoalQuiz::find('quiz-id', $request->inputKelas);

        // MulaiQuiz::create([
        //     'user_id' => $userID,
        //     'kelas_id' => $request-> inputKelas,
        // ]);
        // return redirect()->route('detail-kelas.show', ['id' => $request->inputKelas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = auth()->id();
        $dataKelas = Kelas::where('id', $id)->first();
        $quizAttempt = MulaiQuiz::where('user_id', $userId)->where('quiz_id', $id)->exists();

        $skorQuiz = Sertifikat::where('kelas_id', $id)->where('user_id', $userId)->first();
        if ($quizAttempt) {
            return view('quiz.sudahquiz', compact('dataKelas', 'skorQuiz'));
        }

        // return view('detail-kelas', compact('dataKelas'));
        $dataUser = Auth::user();
        $dataSoal = SoalQuiz::where('kelas_id', $dataKelas->id)->get();
        return view('kelas.mulai-kuis', compact('dataKelas', 'dataSoal', 'dataUser'));
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

    // public function hasil(string $id){
    //     $userId = auth()->id();
    //     $dataKelas = Kelas::where('id', $id)->first();
    //     $totalSkor = MulaiQuiz::where('user_id', $userId)->where('kelas_id', $id)->sum('skor');

    //     $url = null;
    //     if($totalSkor>=70){
    //         $certiController = new CertificateController;
    //         $certiController->generateCertificate(Auth::user()->name);
    //         $url = 'certificate/' . Auth::user()->name;
    //     }

    //     Sertifikat::create([
    //         'user_id' => $userId,
    //         'kelas_id' => $id,
    //         'skor' => $totalSkor,
    //         'url' => $url
    //     ]);
    //     return redirect()->route('detail-kelas.show', $id);
    // }
}
