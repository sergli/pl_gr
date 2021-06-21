<?php

namespace Database\Factories;

use App\Models\Foreigner;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForeignerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Foreigner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'company_id' => \App\Models\Company::factory(),
            'name' => $this->faker->firstName($gender),
            'surname' => $this->faker->firstName($gender),
            'position_id' => \App\Models\Position::factory(),
            'country_id' => \App\Models\Country::factory(),
            'regdate' => $this->faker->date(),
            'regenddate' => $this->faker->date(),
            'patentserie' => 0,
            'patentnumber' => 0,
            'patentdate' => null,
            'patentenddate' => null,
            'patentnextpaydate' => $this->faker->date(),
            'polisnumber' => $this->faker->randomNumber(),
            'poliscompany' => $this->faker->company(),
            'polisdate' => $this->faker->date(),
            'polisenddate' => $this->faker->date(),
            'dateoutwork' => null,
            'dateinwork' => null,
        ];
    }
}
