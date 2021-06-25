<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory()->count(20)->create();
        \App\Models\Country::factory()->count(30)->create();
        \App\Models\Position::factory()->count(10)->create();
        \App\Models\Role::factory()
            ->count(2)
            ->state(new Sequence(
                ['name' => \App\Models\Role::ROLE_USER],
                ['name' => \App\Models\Role::ROLE_ADMIN],
            ))->create();

        $user = [
            'name' => 'Ivan',
            'surname' => 'Petrov',
            'email' => 'ivan@petrov.ru',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
            'company_id' => \App\Models\Company::first()->id,
            'role_id' => \App\Models\Role::firstWhere('name', '=', \App\Models\Role::ROLE_USER)->id,
        ];
        \App\Models\User::factory()->create($user);

        \App\Models\Foreigner::factory()
            ->count(30)
            ->state(new Sequence(
                fn() => ['country_id' =>  \App\Models\Country::all()->random()],
            ))
            ->state(new Sequence(
                fn() => ['company_id' =>  \App\Models\Company::all()->random()],
            ))
            ->state(new Sequence(
                fn() => ['position_id' =>  \App\Models\Position::all()->random()],
            ))
            ->create();

        \App\Models\User::factory()
            ->count(10)
            ->state(new Sequence(
                fn() => ['company_id' =>  \App\Models\Company::all()->random()],
            ))
            ->state(new Sequence(
                fn() => ['role_id' =>  \App\Models\Role::all()->random()],
            ))
            ->create();


        \App\Models\Foreigner::query()->limit(5)->inRandomOrder()->update(['company_id' => $user['company_id']]);
    }
}
