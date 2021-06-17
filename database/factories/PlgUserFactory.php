<?php

namespace Database\Factories;

use App\Models\PlgUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlgUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlgUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surname' => '',
            'position' => '',
            'company_id' => \App\Models\Company::factory(),
            'ccode' => '',
            'role' => '',
            'email' => $this->faker->email(),
        ];
    }
}
