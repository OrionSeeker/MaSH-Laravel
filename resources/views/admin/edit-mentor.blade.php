@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Mentor</h3>
        </div>
        <div class="card-body">
            <a href="{{route('mentor.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <form action="{{route('mentor.update', $dataMentor->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama <input type="text" name="inputName" required value="{{$dataMentor->name}}">
                    Email <input type="text" name="inputEmail" required value="{{$dataMentor->email}}">
                    Password (isi - jika tidak ingin diganti) <input type="text" name="inputPassword" required>
                    Kelas yang diajarkan
                    <select class="form-select">
                        <!-- ini entar isi pake looping, iterasi masing-masing kode kelas -->
                        <option>Pilih salah satu</option>
                    </select>
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