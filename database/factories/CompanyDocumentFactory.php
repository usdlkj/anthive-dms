<?php

namespace Database\Factories;

use App\Models\CompanyDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyDocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyDocument::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->word,
        'document_id' => $this->faker->word
        ];
    }
}
