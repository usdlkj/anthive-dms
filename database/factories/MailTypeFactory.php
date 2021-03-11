<?php

namespace Database\Factories;

use App\Models\MailType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => $this->faker->word,
        'mail_type' => $this->faker->word,
        'mail_type_code' => $this->faker->word,
        'last_mail_number' => $this->faker->word,
        'is_transmittal' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
