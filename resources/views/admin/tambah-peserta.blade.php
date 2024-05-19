@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Peserta</h3>
        </div>
        <div class="card-body">
            <a href="{{route('peserta.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('peserta.store')}}" method="POST">
                @csrf
                <ul class="list-group">
                    Nama <input type="text" name="inputName" required>
                    Email <input type="email" name="inputEmail" required>
                    Role <input type="text" name="inputRole" readonly value="peserta">
                    Password <input type="password" name="inputPassword" required>
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