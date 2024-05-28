@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Soal</h3>
        </div>
        <div class="card-body">
            <a href="{{route('soal.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('soal.update', $dataSoal->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama Kelas
                    <select class="form-select" name="inputNamaKelas">
                        @php
                            $ke = App\Models\Kelas::find($dataSoal->kelas_id)
                        @endphp
                        <option value="{{$dataSoal->kelas_id}}">{{$ke->nama}}</option>
                        @foreach($daftarKelas as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                    </select>
                    Soal <input type="text" name="inputSoal" value="{{$dataSoal->soal}}">  
                    Opsi 1 <input type="text" name="inputOpsi1" value="{{$dataSoal->opsi1}}">  
                    Opsi 2 <input type="text" name="inputOpsi2" value="{{$dataSoal->opsi2}}">  
                    Opsi 3 <input type="text" name="inputOpsi3" value="{{$dataSoal->opsi3}}">  
                    Opsi 4 <input type="text" name="inputOpsi4" value="{{$dataSoal->opsi4}}">  
                    Opsi Benar
                    <select class="form-select" name="inputOpsiBenar">
                        <option value="{{$dataSoal->opsibenar}}">Pilih jika ingin mengganti</option>
                        <option value="1">Opsi 1</option>
                        <option value="2">Opsi 2</option>
                        <option value="3">Opsi 3</option>
                        <option value="4">Opsi 4</option>
                    </select>
                </ul>
                <br>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check2-circle"></i> Edit Data
                </button>

            </form>
        </div>
    </div>
</div>

@endsection