<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Kelas;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas_id = $request->query('kelas_id');
        if ($kelas_id) {
            $materiKelas = Material::where('class_id', $kelas_id)->get();
        } else {
            $materiKelas = Material::all();
        }
        
        $daftarKelas = Kelas::all();
        return view('kelas.index-materi', compact('materiKelas', 'daftarKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarKelas = Kelas::all();
        return view('kelas.tambah-materi', compact('daftarKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('assets/materi-kelas/'), $fileName);
        }

        if($request->inputUrl){
            $fileName = $request->inputUrl;
        }
        else{
            $fileName = "judul";
        }

        Material::create([
            'class_id' => $request->inputNamaKelas,
            'tipe' => $request-> inputTipe,
            'judul' => $request->inputJudul,
            'url' => $fileName
        ]);

        return redirect()->route('materi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materiKelas = Material::where('class_id', $id)->get();
        $daftarKelas = Kelas::all();
        return view('kelas.index-materi', compact('materiKelas','daftarKelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $daftarKelas = Kelas::all();
        $dataMateri = Material::where('id', $id)->first();
        return view('kelas.edit-materi', compact('dataMateri', 'daftarKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileName = null;

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('assets/materi-kelas/'), $fileName);
        }

        if($request->inputUrl){
            $fileName = $request->inputUrl;
        }

        $mat = Material::find($id);

        if($request->inputNamaKelas!="-"){
            $mat->class_id = $request->inputNamaKelas;
        }
        if($request->inputTipe!="-"){
            $mat->tipe = $request->inputTipe;
        }
        $mat->judul = $request->inputJudul;
        $mat->url = $fileName;
        $mat->save();

        return redirect()->route('materi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mat = Material::find($id);
        $mat->delete();

        return redirect()->route('materi.index');
    }
}
