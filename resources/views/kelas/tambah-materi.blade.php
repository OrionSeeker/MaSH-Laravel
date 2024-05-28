@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Materi</h3>
        </div>
        <div class="card-body">
            <a href="{{route('materi.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('materi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="list-group">
                    <!-- Nama Kelas <input type="text" name="inputName" required> -->
                    Nama Kelas
                    <select class="form-select" name="inputNamaKelas">
                        <option>Pilih salah satu</option>
                        @foreach($daftarKelas as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                        </select>
                    Tipe
                    <select class="form-select" name="inputTipe">
                        <option>Pilih salah satu</option>
                        <option>PDF</option>
                        <option>PPT</option>
                        <option>Video</option>
                        <option>Judul</option>
                    </select>
                    Judul <input type="text" name="inputJudul">   
                    Upload File (Kosongkan jika tidak ingin upload gambar)<input type="file" class="form-control-file" id="file" name="file">
                    Link Video Youtube (Kosongkan jika memilih untuk mengupload file) <input type="text" name="inputUrl">   
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