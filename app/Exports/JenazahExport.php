<?php

namespace App\Exports;

use App\Models\Jenazah;
use Maatwebsite\Excel\Concerns\FromCollection;

class JenazahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jenazah::all();
    }
}
