<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = "sertifikat";

    protected $fillable = [
        'id',
        'user_id',
        'kelas_id',
        'skor',
        'url'
    ];
}
