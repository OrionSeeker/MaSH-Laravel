@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Kelas</h3>
        </div>
        <div class="card-body">
            <a href="{{route('kelas.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('kelas.store')}}" method="POST">
                @csrf
                <ul class="list-group">
                    Nama <input type="text" name="inputName" required>
                    Deskripsi <textarea type="text" name="inputDeskripsi" required></textarea>
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