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
                <div class="card-header h1 text-center">Materi</div>

                @auth
                    @if($hasJoined)
                        <!-- Content for users who have joined the class -->
                        <div class="card-body">
                            <div class="ml-2">
                                <a href="public\assets\materi\Prison Architect Artbook.pdf" download="Prison Architect Artbook.pdf">Materi PDF</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="ml-2">
                                <p>Materi Video</p>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rcVb6l4TpHw?si=MKMuwNV-31sFt0AG" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="ml-2">
                                <a class="btn btn-primary" href="#" role="button">Ini Ujian</a>
                            </div>
                        </div>
                    @else
                        <!-- Prompt to join the class -->
                        <div class="card-body">
                            <div class="ml-2">
                                <p>You need to join this class to access the materials.</p>
                                <form action="{{ route('joinkelas.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="inputKelas" value="{{ $dataKelas->id }}">
                                    <button type="submit" class="btn btn-primary">Join Class</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Content for guests only -->
                    <div class="card-body">
                        <div class="ml-2">
                            <p>Login to access the course materials.</p>
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection