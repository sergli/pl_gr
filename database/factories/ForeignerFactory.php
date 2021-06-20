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
        return [
            'company_id' => \App\Models\Company::factory(),
            'surname' => '',
            'name' => $this->faker->name(),
            'country_id' => 0,
            'regdate' => $this->faker->dateTime(),
            'regenddate' => $this->faker->dateTime(),
            'patentserie' => 0,
            'patentnumber' => 0,
            'patentdate' => null,
            'patentenddate' => null,
            'patentnextpaydate' => null,
            'polisnumber' => $this->faker->randomNumber(),
            'poliscompany' => $this->faker->company(),
            'polisdate' => null,
            'polisenddate' => null,
            'dateoutwork' => null,
            'dateinwork' => null,
        ];
    }
}
