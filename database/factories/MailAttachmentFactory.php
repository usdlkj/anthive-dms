<?php

namespace Database\Factories;

use App\Models\MailAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailAttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_id' => $this->faker->word,
        'attachment_id' => $this->faker->word,
        'attachment_type' => $this->faker->word
        ];
    }
}
