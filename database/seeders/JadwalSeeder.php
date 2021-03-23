<?php

namespace Database\Seeders;

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
