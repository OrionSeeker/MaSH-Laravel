@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Admin</h3>
        </div>
        <div class="card-body">
            <a href="{{route ('admin.create')}}" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Tambah Admin</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach($dataAdmin as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->nomorInduk}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->email}}</td>
                    <td>
                        <ul class="nav">
                            <a href="{{route('admin.show', $s->id)}}" class="btn btn-success me-2"><i class="bi bi-person-fill"></i> Show</a>
                            <!-- show ini digunakan untuk menampilkan kelas yang diambil, nilai ujian, sertifikasi, gitu gitu -->
                            <a href="{{route('admin.edit', $s->id)}}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{route('admin.destroy', $s->id)}}" method="POST">
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