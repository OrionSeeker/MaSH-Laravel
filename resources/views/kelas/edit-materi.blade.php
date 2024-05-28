@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Material</h3>
        </div>
        <div class="card-body">
            <a href="{{route('materi.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('materi.update', $dataMateri->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama Kelas
                    <select class="form-select" name="inputNamaKelas">
                        <option value="-">Pilih ini jika ingin mengubah kelas</option>
                        @foreach($daftarKelas as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                        </select>
                    Tipe
                    <select class="form-select" name="inputTipe">
                        <option value="-">Pilih ini jika ingin mengubah tipe</option>
                        <option>PDF</option>
                        <option>PPT</option>
                        <option>Video</option>
                        <option>Judul</option>
                    </select>
                    Judul <input type="text" name="inputJudul" value="{{$dataMateri->judul}}">   
                    Upload File (Kosongkan jika tidak ingin upload gambar)<input type="file" class="form-control-file" id="file" name="file">
                    Link Video Youtube (Abaikan jika isinya adalah url upload file) <input type="text" name="inputUrl" value="{{$dataMateri->url}}">   
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