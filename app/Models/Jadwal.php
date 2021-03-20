<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $with = ['peziarah'];

    protected $guarded = [];

    protected $table = "jadwal";

    public function peziarah()
    {
        return $this->hasMany(Peziarah::class, 'jadwal_id');
    }

    // ...
}
