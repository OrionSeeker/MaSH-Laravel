@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Mentor</h3>
        </div>
        <div class="card-body">
            <a href="{{route ('mentor.create')}}" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Tambah Mentor</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas yang diajar</th>
                    <th>Action</th>
                </tr>
                @foreach($dataMentor as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->nomorInduk}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->email}}</td>
                    <td>Sementara kosong</td>
                    <td>
                        <ul class="nav">
                            <a href="{{route('mentor.show', $s->id)}}" class="btn btn-success me-2"><i class="bi bi-person-fill"></i> Show</a>
                            <!-- show ini digunakan untuk menampilkan kelas yang diambil, nilai ujian, sertifikasi, gitu gitu -->
                            <a href="{{route('mentor.edit', $s->id)}}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{route('mentor.destroy', $s->id)}}" method="POST">
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