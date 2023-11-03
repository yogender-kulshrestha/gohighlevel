<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_code' => '+91',
            'phone_number' => fake()->phoneNumber(),
            'phone_verified_at' => now(),
            'date_of_birth' => Carbon::now()->subYears(rand(18, 25))->subDays(rand(1, 31)),
            'gender' => fake()->randomElement(['Man', 'Woman', 'Neutral']),
            'date_with' => fake()->randomElement(['Man', 'Woman', 'Everyone']),
            'marital_status' => fake()->randomElement(['Single','Married','Engaged','Divorced','Separated']),
            'looking_for' => fake()->randomElement(['Love', 'Friends', 'Fillings', 'Business']),
            'biography' => fake()->randomLetter(),
            'sexual_orientation' => fake()->randomElement(['Straight', 'Gay', 'Lesbian']),
            'tall_are_you' => rand(150, 180),
            'school' => fake()->randomLetter(),
            'job_title' => fake()->randomLetter(),
            'company_name' => fake()->randomLetter(),
            'do_you_drink' => fake()->randomElement(['Socially', 'Never', 'Sometimes']),
            'do_you_smoke' => fake()->randomElement(['Yes', 'No']),
            'feel_about_kids' => fake()->randomElement(['I’d like them someday', 'I’d like them soon']),
            'education' => fake()->randomElement(['High School', 'In grand school', 'In college']),
            'introvert_or_extrovert' => fake()->randomElement(['Introvert', 'Extrovert', 'Somewhere in between']),
            'star_sign' => fake()->randomElement(['Aquariues', 'I’d rather not say']),
            'have_pets' => fake()->randomElement(['Dog(s)', 'Cat(s)', 'Both', 'Other animals', 'None']),
            'religion' => fake()->randomElement(['Agnostic', 'Atheist']),
            'real_photo' => fake()->imageUrl(),
            'is_premium' => rand(0,1),
            'address' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'live_status' => rand(0,1),
            'live_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
