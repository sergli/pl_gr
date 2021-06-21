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
            'company_id'        => \App\Models\Company::factory(),
            'name'              => $this->faker->firstName($gender),
            'surname'           => $this->faker->firstName($gender),
            'position_id'       => \App\Models\Position::factory(),
            'country_id'        => \App\Models\Country::factory(),
            'regdate'           => $this->faker->date(),
            'regenddate'        => $this->faker->date(),
            'patentserie'       => 0,
            'patentnumber'      => 0,
            'patentdate'        => $this->faker->dateTimeBetween('-5 year', '-1 year')->format('Y-m-d H:i:s'),
            'patentenddate'     => $this->faker->dateTimeBetween('+1 year', '+3 year')->format('Y-m-d H:i:s'),
            'patentnextpaydate' => $this->faker->dateTimeBetween('+2 year', '+4 year')->format('Y-m-d H:i:s'),
            'polisnumber'       => $this->faker->randomNumber(),
            'poliscompany'      => $this->faker->company(),
            'polisdate'         => $this->faker->dateTimeBetween('-4 year', '-1 year')->format('Y-m-d H:i:s'),
            'polisenddate'      => $this->faker->dateTimeBetween('+1 year', '+2 year')->format('Y-m-d H:i:s'),
            'dateinwork'        => $this->faker->dateTimeBetween('-3 year', '-2 year')->format('Y-m-d H:i:s'),
            'dateoutwork'       => null,
        ];
    }
}
