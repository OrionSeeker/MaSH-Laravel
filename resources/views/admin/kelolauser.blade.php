@extends('layouts.app')

@section('content')
<h2 class="text-center">Kelola User</h2>

<div class="container d-flex justify-content-center flex-wrap">
    <a href="/peserta" class="text-decoration-none text-dark w-25 m-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Peserta</h3>
            </div>
            <div class="card-body">
                <img src="assets/kelola-user/peserta.png" class="img-fluid">
            </div>
        </div>
    </a>
    <a href="/mentor" class="text-decoration-none text-dark w-25 m-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Mentor</h3>
            </div>
            <div class="card-body">
                <img src="assets/kelola-user/mentor.png" class="img-fluid">
            </div>
        </div>
    </a>
    <a href="/admin" class="text-decoration-none text-dark w-25 m-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Admin</h3>
            </div>
            <div class="card-body">
                <img src="assets/kelola-user/admin.png" class="img-fluid">
            </div>
        </div>
    </a>
</div>
@endsection
