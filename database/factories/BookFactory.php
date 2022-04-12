<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "text" => $this->faker->text,
            "image" => public_path('images/books/photo-1541963463532-d68292c34b19.png'),
            "file" => "file",
            "author_id" => $this->faker->numberBetween(1,10)
        ];
    }
}
