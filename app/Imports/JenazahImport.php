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
        dd($row);
        return new Jenazah([
            'nama'  =>  $row[1],
            'tgl_lahir' => $row[2],
            'tgl_wafat' =>  $row[3]
        ]);
    }
}
