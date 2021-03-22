<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'  =>  'akun_admin',
            'email' => 'admin@app.com',
            'email_verified_at' => Carbon::createFromTimestamp(time()),
            'password'  =>  bcrypt('password'),
        ];

        User::create($user);
    }
}
