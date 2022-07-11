<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
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
            'harga_beli'    => '2400000', 
            'harga_jual'    => '2600000',
            'diskon_beli'   => '200000',
            'status'        => 'Terjual',
            'pembeli'       => $this->faker->name(),
            'category_id'   => mt_rand(1,2),
            'user_id'       => mt_rand(1,3)
        ];
    }
}
