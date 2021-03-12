<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->numberBetween($min = 1, $max = 16),
            'name' => $this->faker->name,
            'email' => $this->faker->companyEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone_number' => $this->faker->phoneNumber,
            'position' => $this->faker->jobTitle,
            'role' => $this->faker->numberBetween($min = 2, $max = 5)
        ];
    }
}
