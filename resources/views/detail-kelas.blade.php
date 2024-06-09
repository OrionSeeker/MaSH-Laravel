@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header h2 text-center">{{$dataKelas->nama}}</div>
                <div class="card-body">
                    <div>
                        <p>{{$dataKelas->deskripsi}}</p>
                    </div>
                </div>
            </div>

            <!-- kalau belum enroll, tampilkan tombol enroll, bukan materi -->

            <div class="card mb-4">
                <div class="card-header h2 text-center">Materi</div>

                @auth
                    @if($hasJoined)
                        <!-- Content for users who have joined the class -->
                        <div class="card-body">
                            @can('isMentorOrAdmin')
                            <a href="{{route('materi.show', $dataKelas->id)}}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit Materi</a>
                            <a href="{{route('soal.show', $dataKelas->id)}}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit soal ujian</a><br><br>
                            @endcan
                            @foreach($daftarMateri as $materi)
                                <div class="ml-2 mb-3">
                                    @if($materi->tipe == 'Judul')
                                        <h3 style="font-weight: bold;">{{ $materi->judul }}</h3>
                                    @elseif($materi->tipe == 'PDF')
                                        <div style="padding-left: 2.0rem";>
                                            <a href="{{ asset('/assets/materi-kelas/' . $materi->url) }}" style="font-size:large;" download><i class="bi bi-file-earmark-pdf"></i>{{ $materi->judul }}</a>
                                        </div>
                                    @elseif($materi->tipe == 'PPT')
                                        <div style="padding-left: 2.0rem";>
                                            <a href="{{ asset('/assets/materi-kelas/' . $materi->url) }}" style="font-size:large;" download><i class="bi bi-filetype-ppt"></i>{{ $materi->judul }}</a>
                                        </div>
                                    @elseif($materi->tipe == 'Video')
                                        <div class="embed-responsive embed-responsive-16by9" style="padding-left: 2.0rem">
                                            <label style="font-size:large">{{$materi->judul}}</label><br>
                                            <iframe class="embed-responsive-item" src="{{ $materi->url }}" allowfullscreen></iframe>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- <div class="card-body">
                            <div class="ml-2">
                                <p>Materi Video</p>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rcVb6l4TpHw?si=MKMuwNV-31sFt0AG" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div> -->

                        <div class="card-body">
                            <div class="ml-2">
                                <a class="btn btn-primary" href="{{route('mulai-kuis.show', $dataKelas->id)}}" role="button"><i class="bi bi-clipboard-check-fill"></i> Ujian</a>
                                @php
                                    $namaUser = Auth::user()->name;
                                    $skorUser = App\Models\Sertifikat::where('user_id', Auth::user()->id)->where('kelas_id', $dataKelas->id)->first();
                                @endphp
                                @if($skorUser && Auth::user()->role!='admin' && Auth::user()->role!='mentor')
                                    @if($skorUser->skor >= 75)
                                    <a class="btn btn-primary" href="{{route('genCerti.buat', [$namaUser, $dataKelas->nama, $skorUser->skor])}}" role="button"> <i class="bi bi-image"></i> Lihat Sertifikat</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- Prompt to join the class -->
                        <div class="card-body">
                            <div class="ml-2">
                                <p>Anda harus join kelas ini untuk bisa melihat materi yang ada!</p>
                                <form action="{{ route('joinkelas.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="inputKelas" value="{{ $dataKelas->id }}">
                                    @can('isPesertaOrAdmin')
                                    <button type="submit" class="btn btn-primary">Join Kelas</button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Content for guests only -->
                    <div class="card-body">
                        <div class="ml-2">
                            <p>Anda harus login untuk melihat materi dari kelas ini!</p>
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection