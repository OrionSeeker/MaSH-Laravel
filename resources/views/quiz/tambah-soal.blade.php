@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Soal</h3>
        </div>
        <div class="card-body">
            <a href="{{route('soal.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('soal.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="list-group">
                    Nama Kelas
                    <select class="form-select" name="inputNamaKelas">
                        <option>Pilih salah satu</option>
                        @foreach($daftarKelas as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                        </select>
                    Soal <input type="text" name="inputSoal">  
                    Opsi 1 <input type="text" name="inputOpsi1">  
                    Opsi 2 <input type="text" name="inputOpsi2">  
                    Opsi 3 <input type="text" name="inputOpsi3">  
                    Opsi 4 <input type="text" name="inputOpsi4">  
                    Opsi Benar
                    <select class="form-select" name="inputOpsiBenar">
                        <option>Pilih salah satu</option>
                        <option value="1">Opsi 1</option>
                        <option value="2">Opsi 2</option>
                        <option value="3">Opsi 3</option>
                        <option value="4">Opsi 4</option>
                    </select>
                    <br>
                </ul>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check2-circle"></i> Simpan Data
                </button>
            </form>
        </div>
    </div>
</div>
@endsection