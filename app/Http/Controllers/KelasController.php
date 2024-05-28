<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelas = Kelas::all();
        return view('admin.index-kelas', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-kelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputName' => 'required|string|max:255',
            'inputDeskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img-kelas/'), $imageName);
        }

        Kelas::create([
            'nama' => $request->inputName,
            'deskripsi' => $request->inputDeskripsi,
            'url_gambar' => $imageName
        ]);

        return redirect()->route('kelas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataKelas = Kelas::where('id', $id)->first();
        return view('admin.show-kelas', compact('dataKelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataKelas = Kelas::where('id', $id)->first();
        return view('admin.edit-kelas', compact('dataKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputName' => 'required|string|max:255',
            'inputDeskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img-kelas/'), $imageName);
        }

        $kelas = Kelas::find($id);
        $kelas->nama = $request->inputName;
        $kelas->deskripsi = $request->inputDeskripsi;
        $kelas->url_gambar = $imageName;
        $kelas->save();

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect()->route('kelas.index');
    }
}
