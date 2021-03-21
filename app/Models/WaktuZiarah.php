<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuZiarah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "waktu_ziarah";

    public function tanggal()
    {
        return $this->belongsToMany(TanggalZiarah::class, 'tanggal_has_waktu', 'waktu_id', 'tanggal_id')->withTimestamps();

        // ...
    }

    public function peziarah() {

        return $this->belongsToMany(Peziarah::class, 'peziarah_has_jadwal', 'waktu_id', 'peziarah_id')->withTimestamps();
    }

    // ...
}
