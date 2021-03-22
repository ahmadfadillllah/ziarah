<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggalZiarah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "tanggal_ziarah";

    public function waktu()
    {
        return $this->belongsToMany(WaktuZiarah::class, 'tanggal_has_waktu', 'tanggal_id', 'waktu_id')->withPivot('kuota')->withTimestamps();
    }

    public function peziarah()
    {
        return $this->belongsToMany(Peziarah::class, 'peziarah_has_jadwal', 'tanggal_id', 'peziarah_id')->withTimestamps();
    }

    // ...
}
