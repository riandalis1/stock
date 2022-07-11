<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->sentence(mt_rand(2,6)),
            'body'          => collect($this->faker->paragraphs(mt_rand(8,10)))
                                    ->map(fn($p) => "<p>$p</p>")
                                    ->implode(''),
            'harga_jual'    => '2600000',
            'quantity'      => 1,
            'category_id'   => mt_rand(1,2),
            'user_id'       => mt_rand(1,3)
        ];
    }
}
