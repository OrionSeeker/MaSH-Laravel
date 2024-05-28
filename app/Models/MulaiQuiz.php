<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MulaiQuiz extends Model
{
    use HasFactory;

    protected $table = "user_quiz";

    protected $fillable = [
        'id',
        'user_id',
        'quiz_id',
        'skor',
        'soal_id'
    ];
}
