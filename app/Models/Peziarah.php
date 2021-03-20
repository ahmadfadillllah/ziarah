<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peziarah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'peziarah';

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class);
    }

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class);
    }

    // ...
}
