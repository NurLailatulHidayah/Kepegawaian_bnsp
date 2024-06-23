<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;

    // protected $table = 'kepegawaians';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'posisi',
        'gaji',
        'tgl_rekrutmen',
    ];
}
