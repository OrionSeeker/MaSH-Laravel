@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- @if(session('success'))
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif -->


                    <!-- {{ __('Anda berhasil login, selamat datang ') }}{{ Auth::user()->name }}! -->
                    
                    <div class="row ml-2">
                        <h4 class="col-4">Nomor Induk</h4>
                        <h4 class="col-8">: {{$user_nomorInduk}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Nama</h4>
                        <h4 class="col-8">: {{$user_name}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Email</h4>
                        <h4 class="col-8">: {{$user_email}}</h4>
                    </div>
                    <div class="row ml-2">
                        <h4 class="col-4">Role</h4>
                        <h4 class="col-8">: {{$user_role}}</h4>
                    </div>
                    <div class="row mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit Profile</a>
                    </div>
                </div>
                @can('isPeserta')
                <div class="card-header">
                    <h3>Kelas yang diikuti</h3>
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
                    <h3>Sertifikat yang dimiliki</h3>
                </div>
                <div class="card-body">
                    @foreach($sertifikatUser as $s)
                        @php
                            $kelas = App\Models\Kelas::find($s->kelas_id);
                        @endphp
                        @if($s->skor>=30)
                        <!-- <a href="{{route('genCerti.buat', ['name' => $user_name, 'kelas' => $kelas->nama, 'skor' => $s->skor])}}">{{$kelas->nama}}</a> -->
                        <a href="{{ url('certificate/'. $user_name. '/' . $kelas->nama.'/'. $s->skor) }}">{{$kelas->nama}}</a>
                        @endif
                        @endforeach
                </div>
                @endcan

                @can('isMentor')
                <div class="card-header">
                    <h3>Kelas yang diajarkan</h3>
                </div>
                <div class="card-body">
                    @php
                        $mentorKelas = App\Models\Kelas::where('id', Auth::user()->id_kelas_ajar)->first();
                    @endphp

                    <a href="{{ url('detail-kelas/' . $mentorKelas->id) }}">{{ $mentorKelas->nama }}</a><br>
                </div>
                @endcan

                @can('isAdmin')
                <div class="card-header">
                    <h3>Statistik</h3>
                </div>
                <!-- ini statistik jumlah peserta -->
                <div class="chart-container" style="display: flex; justify-content: center; align-items: center;">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

                    <canvas id="chartPeserta" style="width:100%;max-width:600px"></canvas>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                        const xValues = @json($namaKelas);
                        const yValues = @json($jumlahPeserta);
                        const barColors = ["red", "green", "blue", "orange", "brown", "purple", "grey"];

                        new Chart("chartPeserta", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors.slice(0, xValues.length),
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: "Jumlah Peserta per Kelas"
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>

                <!-- ini statistik jumlah mentor -->
                <div class="chart-container" style="display: flex; justify-content: center; align-items: center;">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

                    <canvas id="chartMentor" style="width:100%;max-width:600px"></canvas>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                        const xValues = @json($namaKelas);
                        const yValues = @json($jumlahMentor);
                        const barColors = ["red", "green", "blue"];

                        new Chart("chartMentor", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors.slice(0, xValues.length),
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: "Jumlah Mentor per Kelas"
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>
                @endcan

            </div>
        </div>
    </div>
</div>
@endsection
