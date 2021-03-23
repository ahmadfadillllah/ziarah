<?php

namespace Database\Seeders;

use App\Models\WaktuZiarah;
use Illuminate\Database\Seeder;

class WaktuSeeder extends Seeder
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
            // [
            //     'dari'      =>  '10.30',
            //     'sampai'    =>  '11.00',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '11.00',
            //     'sampai'    =>  '11.30',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '11.30',
            //     'sampai'    =>  '12.00',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '15.30',
            //     'sampai'    =>  '16.00',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '16.00',
            //     'sampai'    =>  '16.30',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '16.30',
            //     'sampai'    =>  '17.00',
            //     'tipe'      =>  'WITA',
            // ],
            // [
            //     'dari'      =>  '17.00',
            //     'sampai'    =>  '17.30',
            //     'tipe'      =>  'WITA',
            // ],
        ];

        foreach ($jam_peziarah as $jam) {

            WaktuZiarah::create($jam);

            // ...
        }

        // ...
    }

    // ...
}
