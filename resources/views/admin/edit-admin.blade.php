@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Admin</h3>
        </div>
        <div class="card-body">
            <a href="{{route('admin.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('admin.update', $dataAdmin->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama <input type="text" name="inputName" required value="{{$dataAdmin->name}}">
                    Email <input type="text" name="inputEmail" required value="{{$dataAdmin->email}}">
                    Password (isi - jika tidak ingin diganti) <input type="text" name="inputPassword" required>
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