<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataJenazah extends Model
{
    use HasFactory;
    protected $table = 'jenazah';

    protected $fillable = [
        'blok',
        'nama',
        'tgl_lahir',
        'tgl_wafat',
        // 'agama',
        // 'rumah_sakit',
        'alamat',
    ];
}
