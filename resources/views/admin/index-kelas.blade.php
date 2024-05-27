@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Kelas</h3>
        </div>
        <div class="card-body">
            <a href="{{route ('kelas.create')}}" class="btn btn-success"><i class="bi bi-person-fill-add"></i> Tambah Kelas</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
                @foreach($dataKelas as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->deskripsi}}</td>
                    <td>
                        <ul class="nav">
                            <a href="{{route('kelas.show', $s->id)}}" class="btn btn-success me-2"><i class="bi bi-person-fill"></i> Show</a>
                            <a href="{{route('kelas.edit', $s->id)}}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                            <form action="{{route('kelas.destroy', $s->id)}}" method="POST">
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