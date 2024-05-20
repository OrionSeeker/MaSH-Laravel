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

<h2 class="text-center mt-4">List Kelas yang Tersedia</h2>
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/sbd2.png" alt="Sistem Basis Data">
                    <div class="image-text">Sistem Basis Data</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/web2.png" alt="Pemrograman Web">
                    <div class="image-text">Pemrograman Web</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/alpro2.png" alt="Algoritma dan Pemrograman">
                    <div class="image-text">Algoritma dan Pemrograman</div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/sbd2.png" alt="Sistem Basis Data">
                    <div class="image-text">Sistem Basis Data</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/web2.png" alt="Pemrograman Web">
                    <div class="image-text">Pemrograman Web</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/alpro2.png" alt="Algoritma dan Pemrograman">
                    <div class="image-text">Algoritma dan Pemrograman</div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/sbd2.png" alt="Sistem Basis Data">
                    <div class="image-text">Sistem Basis Data</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/web2.png" alt="Pemrograman Web">
                    <div class="image-text">Pemrograman Web</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/alpro2.png" alt="Algoritma dan Pemrograman">
                    <div class="image-text">Algoritma dan Pemrograman</div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/sbd2.png" alt="Sistem Basis Data">
                    <div class="image-text">Sistem Basis Data</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/web2.png" alt="Pemrograman Web">
                    <div class="image-text">Pemrograman Web</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a class="d-flex flex-column align-items-center text-center" href="{{ url('detail-kelas') }}"> 
                <div class="image-container">
                    <img width="100%" height="150" src="/assets/img-geser/alpro2.png" alt="Algoritma dan Pemrograman">
                    <div class="image-text">Algoritma dan Pemrograman</div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection