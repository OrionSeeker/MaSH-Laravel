<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function generateCertificate($name)
    {
        // Load the certificate template
        $templatePath = public_path('assets/sertifikat/certificate_template.png');
        $img = imagecreatefrompng($templatePath);

        // Set font settings
        $font = public_path('assets/sertifikat/amsterdam-four.ttf');
        // $fontCourse = public_path('assets/sertifikat/OpenSans-SemiBold.ttf');
        $fontCourse = public_path('assets/sertifikat/Ubuntu-R.ttf');
        $fontSize = 80;
        $fontColor = imagecolorallocate($img, 0, 0, 0); // Black

        // Calculate text position (adjust as needed)
        $textX = 900;
        $textY = 700;
        $textXCourse = 800;
        $textYCourse = 950;
        $textXdate = 925;
        $textYdate = 1315;

        // Add dynamic text to the certificate
        imagettftext($img, $fontSize, 0, $textX, $textY, $fontColor, $font, $name);
        
        imagettftext($img, 50, 0, $textXCourse, $textYCourse, $fontColor, $fontCourse, "Pemrograman Berorientasi Objek");

        imagettftext($img, 20, 0, $textXdate, $textYdate, $fontColor, $fontCourse, "22 Mei 2024");

        // Set the content type and send the image to the browser
        header('Content-Type: image/png');
        imagepng($img);

        // Or save the generated certificate image
        $outputPath = public_path("assets/sertifikat/{$name}.png");
        imagepng($img, $outputPath);

        // Free up memory
        imagedestroy($img);
    }

    public function buat($nama){
        $certiController = new CertificateController;
        $certiController->generateCertificate($nama);
    }
}
