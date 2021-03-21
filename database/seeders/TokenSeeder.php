<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = [
            [
                'token' => 'satgassulselprov2021',
            ],
        ];

        foreach ($token as $t) {
            Token::create($t);
        }
    }
}
