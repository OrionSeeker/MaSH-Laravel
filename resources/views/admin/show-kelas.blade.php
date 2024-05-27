@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h3>Informasi Kelas</h3>
        </div>
        <div class="card-body">
            <a href="{{route('kelas.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <br><br>
            <div class="row ml-2">
                <h4 class="col-4">ID</h4>
                <h4 class="col-8">: {{$dataKelas->id}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Nama Kelas</h4>
                <h4 class="col-8">: {{$dataKelas->nama}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Deskripsi</h4>
                <h4 class="col-8">: {{$dataKelas->deskripsi}}</h4>
            </div>
        </div>

    </div>
</div>
@endsection