@extends('layouts.app')
<!-- buat manggil template.blade sebagai templatenya   -->

@section('content')
<!-- ngisi yield pada template -->
<div class="container-fluid d-flex justify-content-center align-items-center" id="header-container">
    <div class="p-5 mb-4 bg-light rounded-3 text-center" id="header-text">
        <h1>Mataram Study Hub</h1>
        <p>Latih dirimu menjadi masyarakat yang berdaya saing tinggi</p>
        <a href="#" class="btn btn-primary">Belajar Sekarang</a>
    </div>
    <div id="header-img">
        <img src="assets/header-img.jpg" id="header-img-content">
    </div>
</div>


<h2 class="text-center mt-4">Kelas Pelatihan Baru</h2>
<div id="kelas-baru" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#kelas-baru" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#kelas-baru" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#kelas-baru" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img-geser/alpro2.png" class="mx-auto d-block" alt="Alpro">
            <div class="carousel-caption">
                <h3>Algoritma dan Pemrograman</h3>
                <p>Mempelajari dasar-dasar dari pemrograman</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/assets/img-geser/web2.png" class="mx-auto d-block" alt="web">
            <div class="carousel-caption">
                <h3>Pemrograman Web</h3>
                <p>Mempelajari dasar-dasar dari pemrograman web</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/assets/img-geser/sbd2.png"  class="mx-auto d-block" alt="SBD">
            <div class="carousel-caption">
                <h3>Sistem Basis Data</h3>
                <p>Mempelajari dasar-dasar dari sistem basis data</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#kelas-baru" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#kelas-baru" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endsection