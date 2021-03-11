<?php

namespace Database\Factories;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thread_starter_id' => $this->faker->word,
        'previous_mail_id' => $this->faker->word,
        'mail_type_id' => $this->faker->word,
        'sender_id' => $this->faker->word,
        'mail_code' => $this->faker->word,
        'mail_status' => $this->faker->word,
        'subject' => $this->faker->word,
        'message' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
