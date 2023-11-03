<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*$users = \App\Models\User::all();
        foreach ($users as $user) {
            \App\Models\User::where('id', $user->id)->update([
                'address' => fake()->streetAddress(),
                'city' => fake()->city(),
                'state' => Address::state(),
                'country' => 'US'
            ]);
        }*/
    }
}
