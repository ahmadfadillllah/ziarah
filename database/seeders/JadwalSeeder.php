<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\TanggalZiarah;
use App\Models\WaktuZiarah;
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

        $jam_peziarah = [
            [
                'dari'      =>  '09.30',
                'sampai'    =>  '10.00',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '10.00',
                'sampai'    =>  '10.30',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '10.30',
                'sampai'    =>  '11.00',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '11.00',
                'sampai'    =>  '11.30',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '11.00',
                'sampai'    =>  '11.30',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '15.30',
                'sampai'    =>  '16.00',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '16.00',
                'sampai'    =>  '16.30',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '16.30',
                'sampai'    =>  '17.00',
                'tipe'      =>  'WITA',
            ],
            [
                'dari'      =>  '17.00',
                'sampai'    =>  '17.30',
                'tipe'      =>  'WITA',
            ],
        ];

        foreach ($jam_peziarah as $jam) {

            WaktuZiarah::create($jam);

            // ...
        }

        $bulan = date('m', time());
        $tahun = date('Y', time());

        $jumlah_hari_dalam_sebulah = cal_days_in_month(CAL_GREGORIAN, intval($bulan), intval($tahun));

        $hari_ini = date('d', time());

        for ($i = 1; $i <= 12; $i++) {

            if ($i < intval($bulan)) continue;

            for ($index = 1; $index <= $jumlah_hari_dalam_sebulah; $index++) {

                if ($index < intval($hari_ini)) continue;

                TanggalZiarah::create([
                    'tanggal'   =>  $index,
                    'bulan'     =>  $i,
                    'tahun'     =>  $tahun,
                ]);

                // ...
            }

            // ...
        }


        // ...
    }
}
