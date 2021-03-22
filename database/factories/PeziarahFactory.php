<?php

namespace Database\Factories;

use App\Models\Peziarah;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeziarahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Peziarah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $_ar = explode('+', $this->faker->e164PhoneNumber);
        return [
            'nama'  =>  $this->faker->name,
            'jenis_kelamin' => "Laki-Laki",
            'email' =>  $this->faker->email,
            'no_hp' =>  implode('', $_ar),
            'jenazah_id' => 1,
        ];
    }
}
