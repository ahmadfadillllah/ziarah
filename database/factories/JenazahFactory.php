<?php

namespace Database\Factories;

use App\Models\Jenazah;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenazahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jenazah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'      =>  $this->faker->name,
            'alamat'    =>  $this->faker->address,
            'blok'      =>  uniqid(),
            'agama'     =>  $this->faker->text,
        ];
    }
}
