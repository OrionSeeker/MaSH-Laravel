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
                        <div class="form-group">
                            <div class="d-flex align-items-center mb-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="soal{{$s->id}}_1" name="inputJawaban[{{$s->id}}]" class="custom-control-input" value="1" required>
                                    <label class="custom-control-label radio-label" for="soal{{$s->id}}_1">A</label>
                                </div>
                                <span class="ms-2">{{$s->opsi1}}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="soal{{$s->id}}_2" name="inputJawaban[{{$s->id}}]" class="custom-control-input" value="2" required>
                                    <label class="custom-control-label radio-label" for="soal{{$s->id}}_2">B</label>
                                </div>
                                <span class="ms-2">{{$s->opsi2}}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="soal{{$s->id}}_3" name="inputJawaban[{{$s->id}}]" class="custom-control-input" value="3" required>
                                    <label class="custom-control-label radio-label" for="soal{{$s->id}}_3">C</label>
                                </div>
                                <span class="ms-2">{{$s->opsi3}}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="soal{{$s->id}}_4" name="inputJawaban[{{$s->id}}]" class="custom-control-input" value="4" required>
                                    <label class="custom-control-label radio-label" for="soal{{$s->id}}_4">D</label>
                                </div>
                                <span class="ms-2">{{$s->opsi4}}</span>
                            </div>
                        </div>
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
