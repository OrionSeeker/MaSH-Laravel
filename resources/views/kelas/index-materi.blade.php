@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Daftar Materi</h3>
        </div>
        <div class="card-body">
            <a href="{{route ('materi.create')}}" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Tambah Material</a>

            <form action="{{route('materi.index')}}" method="GET" class="d-inline">
                <br>
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
                    <th>Tipe</th>
                    <th>Judul</th>
                    <th>Url</th>
                    <!-- <th>Urutan</th> -->
                    <th>Action</th>
                </tr>
                @foreach($materiKelas as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->class_id}}</td>
                    <td>{{$s->tipe}}</td>
                    <td>{{$s->judul}}</td>
                    <td>{{$s->url}}</td>
                    <!-- <td>{{$s->urutan}}</td> -->
                    <td>
                        <ul class="nav">
                            <!-- show ini digunakan untuk menampilkan kelas yang diambil, nilai ujian, sertifikasi, gitu gitu -->
                            <a href="{{route('materi.edit', $s->id)}}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{route('materi.destroy', $s->id)}}" method="POST">
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