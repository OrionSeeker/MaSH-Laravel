<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function generateCertificate($name, $kelas, $skor)
    {
        // load template sertifikat
        $templatePath = public_path('assets/sertifikat/certificate_template.png');
        $img = imagecreatefrompng($templatePath);

        // font yang dipake
        $font = public_path('assets/sertifikat/amsterdam-four.ttf');
        // $fontCourse = public_path('assets/sertifikat/OpenSans-SemiBold.ttf');
        $fontCourse = public_path('assets/sertifikat/Ubuntu-R.ttf');
        $fontSize = 80;
        $fontColor = imagecolorallocate($img, 0, 0, 0); // Black

        // posisi text
        $textX = 600;
        $textY = 700;
        $textXCourse = 800;
        $textYCourse = 950;
        $textXdate = 925;
        $textYdate = 1315;
        $textXskor = 925;
        $textYskor = 1130;


        $tanggal = date('d M Y'); 
        // masukin teks
        imagettftext($img, $fontSize, 0, $textX, $textY, $fontColor, $font, $name);
        
        imagettftext($img, 50, 0, $textXCourse, $textYCourse, $fontColor, $fontCourse, $kelas);

        imagettftext($img, 30, 0, $textXskor, $textYskor, $fontColor, $fontCourse, $skor);

        imagettftext($img, 20, 0, $textXdate, $textYdate, $fontColor, $fontCourse, $tanggal);

        // atur tipe file yang ditampilin dibrowser
        header('Content-Type: image/png');
        imagepng($img);

        // simpen sertifnya
        $outputPath = public_path("assets/sertifikat/{$name}{$kelas}{$skor}.png");
        imagepng($img, $outputPath);

        // kosongin memori
        imagedestroy($img);
    }

    public function buat($nama, $kelas, $skor){
        $certiController = new CertificateController;
        $certiController->generateCertificate($nama, $kelas, $skor);
    }
}
