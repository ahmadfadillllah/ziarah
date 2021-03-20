<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peziarah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'peziarah';

    protected $with = ['jadwal'];

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    // ...
}
