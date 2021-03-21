<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peziarah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'peziarah';

    protected $with = ['waktu_ziarah', 'tanggal_ziarah'];

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class);
    }

    public function waktu_ziarah()
    {
        return $this->belongsToMany(WaktuZiarah::class, 'peziarah_has_jadwal', 'peziarah_id', 'waktu_id')
            ->withPivot('tanggal_id')->withTimestamps();
    }

    public function tanggal_ziarah()
    {
        return $this->belongsToMany(TanggalZiarah::class, 'peziarah_has_jadwal', 'peziarah_id', 'tanggal_id')
            ->withPivot('waktu_id')->withTimestamps();
    }


    // ...
}
