<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPerpus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 'nama', 'kelas', 'jurusan'
    ];
}
