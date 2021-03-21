<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenazah extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "jenazah";

    public function peziarah()
    {
        return $this->hasMany(Peziarah::class);
    }

    // ...
}
