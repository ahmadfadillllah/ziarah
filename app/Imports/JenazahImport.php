<?php

namespace App\Imports;

use App\Models\Jenazah;
use Maatwebsite\Excel\Concerns\ToModel;

class JenazahImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Jenazah([
            'nama'  =>  $row[1],
        ]);
    }
}
