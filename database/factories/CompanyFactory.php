<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        while(true) {
            try {
                $companyName = $this->faker->company;
                $companySuffix = $this->faker->companySuffix;

                return [
                    'company_name' => $companyName.' '.$companySuffix,
                    'trading_name' => $companyName,
                    'company_code' => strtoupper(substr($this->faker->unique()->word, 0, 3)),
                    'address' => $this->faker->streetAddress,
                    'city' => $this->faker->city,
                    'post_code' => $this->faker->postcode,
                    'country' => $this->faker->country,
                    'phone_number' => $this->faker->phoneNumber,
                    'email' => $this->faker->companyEmail,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                break;
            } catch (Exception $e) {}
        }
    }
}
