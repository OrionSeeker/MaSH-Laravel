<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalQuiz extends Model
{
    use HasFactory;

    protected $table = "soalquiz";

    protected $fillable = [
        'id',
        'kelas_id',
        'soal',
        'opsi1',
        'opsi2',
        'opsi3',
        'opsi4',
        'opsibenar'
    ];
}
