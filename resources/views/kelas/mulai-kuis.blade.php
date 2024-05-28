@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Kuis {{$dataKelas->nama}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('mulai-kuis.store')}}" method="POST">
                @csrf
                @foreach($dataSoal as $s)
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>{{$s->soal}}</h4>
                        <select class="form-select" name="inputJawaban[{{$s->id}}]" required>
                            <option value="">Pilih salah satu</option>
                            <option value="1">{{$s->opsi1}}</option>
                            <option value="2">{{$s->opsi2}}</option>
                            <option value="3">{{$s->opsi3}}</option>
                            <option value="4">{{$s->opsi4}}</option>
                        </select>
                    </li>
                </ul>
                <br>
                @endforeach
                <input type="hidden" name="inputKelas" value="{{ $dataKelas->id }}">
                <button type="submit" class="btn btn-success mt-3">
                    <i class="bi bi-check2-circle"></i> Simpan Jawaban
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
