@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-warning">
        <!-- <h4>Anda sudah pernah mengerjakan ujian ini!</h4> -->

        @php
            echo $kalimat;
            $namaKelas = App\Models\Kelas::find($dataKelas->id);
        @endphp
        <p>Nama Kelas: {{$namaKelas->nama}}</p>
        <p>Skor anda: {{$skorQuiz->skor}}</p>
        @if($skorQuiz->skor >= 30)
            <p>Anda berhak mengambil sertifikat anda!</p>
            @php
                $namaUser = Auth::user()->name;
            @endphp
            <a class="btn btn-primary" href="{{ route('genCerti.buat', ['name' => $namaUser]) }}" role="button">Ambil Sertifikat</a>
        @else
            <p>Sayang sekali anda tidak lulus kelas ini dan tidak dapat mengambil sertifikat!</p>
        @endif
    </div>
    <a href="{{ route('detail-kelas.show', ['id' => $dataKelas->id]) }}" class="btn btn-primary">
        Kembali ke Halaman Kelas
    </a>
</div>
@endsection
