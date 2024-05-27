<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasUser extends Model
{
    use HasFactory;

    protected $table = "kelas_user";

    protected $fillable = [
        'id',
        'user_id',
        'kelas_id',
        'role'
    ];
}
