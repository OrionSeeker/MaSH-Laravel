@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Daftar Soal</h3>
        </div>
        <div class="card-body">
            <a href="{{route('soal.create')}}" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Tambah Soal</a>
            <br><br>
            <form action="{{route('soal.index')}}" method="GET" class="d-inline">
                <label for="kelas_id">Filter by Kelas:</label>
                <select class="form-select" name="kelas_id" id="kelas_id" onchange="this.form.submit()">
                    <option value="">Pilih salah satu</option>
                    @foreach($daftarKelas as $kelas)
                        <option value="{{$kelas->id}}" {{ request('kelas_id') == $kelas->id ? 'selected' : '' }}>{{$kelas->nama}}</option>
                    @endforeach
                </select>
            </form>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>ID_Kelas</th>
                    <th class="soal-column">Soal</th>
                    <th class="opsi-column">Opsi 1</th>
                    <th class="opsi-column">Opsi 2</th>
                    <th class="opsi-column">Opsi 3</th>
                    <th class="opsi-column">Opsi 4</th>
                    <th>Opsi Benar</th>
                    <th>Action</th>
                </tr>
                @foreach($dataQuiz as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->kelas_id}}</td>
                    <td class="soal-column">{{$s->soal}}</td>
                    <td class="opsi-column">{{$s->opsi1}}</td>
                    <td class="opsi-column">{{$s->opsi2}}</td>
                    <td class="opsi-column" >{{$s->opsi3}}</td>
                    <td class="opsi-column">{{$s->opsi4}}</td>
                    <td>{{$s->opsibenar}}</td>
                    <td>
                        <ul class="nav">
                            <a href="{{route('soal.edit', $s->id)}}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{route('soal.destroy', $s->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
