<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jadwal = [
            [
                'jadwal' => '09.30 - 10.00 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '10.00 - 10.30 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '10.30 - 11.00 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '11.00 - 11.30 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '15.30 - 16.00 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '16.00 - 16.30 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '16.30 - 17.00 WITA',
                'kuota' =>  0,
            ],
            [
                'jadwal' => '17.00 - 17.30 WITA',
                'kuota' =>  0,
            ],
        ];

        foreach ($jadwal as $j) {
            Jadwal::create($j);
        }

        // ...
    }
}
