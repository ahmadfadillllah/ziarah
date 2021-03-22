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
                'dari'      =>  '11.30',
                'sampai'    =>  '12.00',
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

        $bulan_skarang = date('m', time());
        $tahun_skarang = date('Y', time());

        $jumlah_hari_dalam_sebulah = cal_days_in_month(CAL_GREGORIAN, intval($bulan_skarang), intval($tahun_skarang));

        $hari_ini = date('d', time());

        for ($_bulan = 1; $_bulan <= 12; $_bulan++) {

            $isActive = 1;

            if ($_bulan < intval($bulan_skarang)) {
                $isActive = 0;
            }

            for ($hari = 1; $hari <= $jumlah_hari_dalam_sebulah; $hari++) {

                if ($_bulan === intval($bulan_skarang)) {

                    if ($hari <= intval($hari_ini)) {
                        $isActive = 0;
                    } else {
                        $isActive = 1;
                    }

                    // ...
                }

                TanggalZiarah::create([
                    'tanggal'   =>  $hari,
                    'bulan'     =>  $_bulan,
                    'tahun'     =>  $tahun_skarang,
                    'aktif'     =>  $isActive,
                ]);

                // ...
            }

            // ...
        }



        $tanggal = TanggalZiarah::get();

        foreach ($tanggal as $_tanggal) {

            $waktu = WaktuZiarah::get();

            foreach ($waktu as $_waktu) {

                if ($_tanggal instanceof TanggalZiarah) {
                    $_tanggal->waktu()->attach($_waktu);
                }

                // ..
            }


            // ...
        }


        // ...
    }
}
