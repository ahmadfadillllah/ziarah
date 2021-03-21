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
        return [
            'nama'  =>  $this->faker->name,
            'jenis_kelamin' => "Laki-Laki",
            'email' =>  $this->faker->email,
            'no_hp' =>  $this->faker->phoneNumber,
            'jenazah_id' => 1,
        ];
    }
}
