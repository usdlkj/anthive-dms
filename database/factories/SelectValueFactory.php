<?php

namespace Database\Factories;

use App\Models\SelectValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class SelectValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SelectValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_field_id' => $this->faker->word,
        'value_code' => $this->faker->word,
        'value_text' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
