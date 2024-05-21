@extends('layouts.app')
<!-- buat manggil template.blade sebagai templatenya   -->

@section('content')
<!-- ngisi yield pada template -->

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<script src="https://kit.fontawesome.com/f27a469d44.js" crossorigin="anonymous"></script>

<div class="container-fluid d-flex justify-content-center align-items-center" id="header-container">
    <div class="p-5 mb-4 bg-light rounded-3 text-center" id="header-text">
        <h1>Mataram Skill Hub</h1>
        <p>Latih dirimu menjadi masyarakat yang berdaya saing tinggi</p>
        <a href="{{ url('/list-kelas') }}" class="btn btn-primary">Belajar Sekarang</a>
    </div>
    <div id="header-img">
        <img src="assets/mentor-dan-review/laptop.jpg" id="header-img-content">
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

<div class="mentor">
    <h2>Mentor Terbaik Kami</h2>
    <div class='row'>
        <div class="mentor-card">
            <img src="/assets/mentor-dan-review/1.jpg">
            <h4 class="mentor-name">Lalu Cholidimas Raniawan</h4>
        </div>
        <div class="mentor-card">
            <img src="/assets/mentor-dan-review/2.jpg">
            <h4 class="mentor-name">Michael Effendy</h4>
        </div>
        <div class="mentor-card">
            <img src="/assets/mentor-dan-review/3.jpg">
            <h4 class="mentor-name">Wahyuni Sulastri</h4>
        </div>
        <div class="mentor-card">
            <img src="/assets/mentor-dan-review/4.jpg">
            <h4 class="mentor-name">Yeon Jun</h4>
        </div>
    </div> 
</div>

<div class="review">
    <h2 class="heading">Review Peserta</h2>
    <div class="box-container">
        <div class="box">
            <div class="star">
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            </div>
            <p>Dulu, saya sempat tidak percaya diri dengan kemampuan saya. Namun, skill yang saya dapatkan membuat saya berani untuk melamar ke salah satu bank BUMN ternama di Indonesia. Akhirnya, saya berhasil diterima sebagai Full Stack Developer di Bank ABC.</p>
            <div class="user">
                <img src="/assets/mentor-dan-review/7.jpg" alt="">
                <div class="user-info">
                    <h3>Muhammad Zidan Azzaki</h3>
                </div>
                <i class="fa-solid fa-quote-right"></i>
            </div>
        </div>
        <div class="box">
            <div class="star">
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            </div>
            <p>Belajar di Mataram Skill Hub tidak hanya bermanfaat bagi mereka yang masih pemula dalam hal wawasan teknologi, tetapi juga membantu profesional yang sudah berpengalaman kerja seperti saya untuk dapat mengupdate keterampilan.</p>
            <div class="user">
                <img src="/assets/mentor-dan-review/6.jpg" alt="">
                <div class="user-info">
                    <h3>Baiq Annisa Tsalist Agna</h3>
                </div>
                <i class="fa-solid fa-quote-right"></i>
            </div>
        </div>
        <div class="box">
            <div class="star">
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            </div>
            <p>Disajikan dengan struktur pembelajaran yang rapi, ilmu-ilmu teknis di Mataram Skill Hub sangat mudah saya pahami dan terapkan sampai sekarang. Mataram Skill Hub memastikan semua lulusannya punya dasar yang kuat di bidang pemrograman dan bidang lainnya.</p>
            <div class="user">
                <img src="/assets/mentor-dan-review/5.jpg" alt="">
                <div class="user-info">
                    <h3>Gusti Ayu Devi</h3>
                </div>
                <i class="fa-solid fa-quote-right"></i>
            </div>
        </div>
    </div>
</div>
@endsection