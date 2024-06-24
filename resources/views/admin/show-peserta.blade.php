@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h3>Profil Peserta</h3>
        </div>
        <div class="card-body">
            <a href="{{route('peserta.index')}}" class="btn btn-primary"><i class="bi bi-chevron-double-left"></i> Kembali</a>
            <br><br>
            <div class="row ml-2">
                <h4 class="col-4">Nama</h4>
                <h4 class="col-8">: {{$dataPeserta->name}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">NomorInduk</h4>
                <h4 class="col-8">: {{$dataPeserta->nomorInduk}}</h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Email</h4>
                <h4 class="col-8">: {{$dataPeserta->email}}</h4>
            </div>
        </div>

        <div class="card-header">
            <h3>Kelas yang diikuti Peserta</h3>
        </div>
        <div class="card-body">
            @foreach($kelasUser as $s)
                @php
                    $kelas = App\Models\Kelas::find($s->kelas_id);
                @endphp
                <a href="{{ url('detail-kelas/' . $s->kelas_id) }}">{{$kelas->nama}}</a><br>
            @endforeach
        </div>

        <div class="card-header">
            <h3>Sertifikat yang dimiliki Peserta</h3>
        </div>
        <div class="card-body">
            @foreach($sertifikatUser as $s)
                @php
                    $kelas = App\Models\Kelas::find($s->kelas_id);
                @endphp
                @if($s->skor>=30)
                    <a href="{{ url('certificate/'. $dataPeserta->name. '/' . $kelas->nama.'/'. $s->skor) }}">{{$kelas->nama}}</a>
                @endif
            @endforeach
        </div>


    </div>
</div>
@endsection