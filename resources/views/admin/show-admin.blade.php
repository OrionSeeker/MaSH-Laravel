@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h3>Profil Admin</h3>
        </div>
        <div class="card-body">
            <a href="{{route('admin.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <br><br>
            <div class="row ml-2">
                <h4 class="col-4">Nama</h4>
                <h4 class="col-8">: {{$dataAdmin->name}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">NomorInduk</h4>
                <h4 class="col-8">: {{$dataAdmin->nomorInduk}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Email</h4>
                <h4 class="col-8">: {{$dataAdmin->email}}</h4>
            </div>
        </div>

    </div>
</div>
@endsection