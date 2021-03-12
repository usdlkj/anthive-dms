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
        $company = $this->faker->company;
        $suffix = $this->faker->companySuffix;
        return [
            'company_name' => $company.' '.$suffix,
            'trading_name' => $company,
            'company_code' => $this->faker->unique()->word,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'post_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];
    }
}
