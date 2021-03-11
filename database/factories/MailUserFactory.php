<?php

namespace Database\Factories;

use App\Models\MailUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_id' => $this->faker->word,
        'user_id' => $this->faker->word
        ];
    }
}
