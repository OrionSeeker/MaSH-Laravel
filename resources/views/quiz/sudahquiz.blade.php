@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-warning">
        <h4>Anda sudah pernah mengerjakan ujian ini!</h4>
        @php
            $namaKelas = App\Models\Kelas::find($dataKelas->id);
        @endphp
        <p>Nama Kelas: {{$namaKelas->nama}}</p>
        <p>Skor anda: </p>
    </div>
    <a href="{{ route('detail-kelas.show', ['id' => $dataKelas->id]) }}" class="btn btn-primary">
        Kembali ke Halaman Kelas
    </a>
</div>
@endsection
