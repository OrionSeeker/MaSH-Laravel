@extends('layouts.app')

@section('style')

<style>
.image-container {
    position: relative;
    border-radius: 10px;
}

.image-container img {
    transition: opacity 0.3s ease;
    border-radius: 10px;
}

.image-container .image-text {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 10px;
}

.image-container:hover img {
    opacity: 0;
}

.image-container:hover .image-text {
    opacity: 1;
}
</style>

@endsection

@section('content')

<h2 class="text-center mt-4">Kelas yang Tersedia</h2>
<div class="container">
    <div class="row">
        @foreach($daftarKelas as $class)
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas', $class->id) }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="{{ $class->url_gambar ? asset('assets/img-kelas/' . $class->url_gambar) : asset('assets/img-kelas/default.jpg') }}" alt="{{ $class->name }}">
                    <div class="image-text">{{ $class->nama }}</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection