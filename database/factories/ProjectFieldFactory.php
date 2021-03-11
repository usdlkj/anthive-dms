<?php

namespace Database\Factories;

use App\Models\ProjectField;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => $this->faker->word,
        'field_code' => $this->faker->word,
        'field_type' => $this->faker->word,
        'field_text' => $this->faker->word,
        'visible' => $this->faker->word,
        'mandatory' => $this->faker->word,
        'sequence' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
