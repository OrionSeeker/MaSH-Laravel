@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h3>Profil Mentor</h3>
        </div>
        <div class="card-body">
            <a href="{{route('mentor.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <br><br>
            <div class="row ml-2">
                <h4 class="col-4">Nama</h4>
                <h4 class="col-8">: {{$dataMentor->name}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">NomorInduk</h4>
                <h4 class="col-8">: {{$dataMentor->nomorInduk}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Email</h4>
                <h4 class="col-8">: {{$dataMentor->email}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Kelas yang diajarkan</h4>
                @php
                    $ke = App\Models\Kelas::find($dataMentor->id_kelas_ajar);
                @endphp
                <h4 class="col-8">: {{$ke->nama}}</h4>
            </div>
        </div>

        <!-- <div class="card-header">
            <h3>Kelas yang diajarkan mentor</h3>
        </div>
        <div class="card-body">

        </div> -->


    </div>
</div>
@endsection