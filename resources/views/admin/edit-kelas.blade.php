@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Kelas</h3>
        </div>
        <div class="card-body">
            <a href="{{route('kelas.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('kelas.update', $dataKelas->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama <input type="text" name="inputName" required value="{{$dataKelas->nama}}">
                    Email <input type="text" name="inputDeskripsi" required value="{{$dataKelas->deskripsi}}">
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