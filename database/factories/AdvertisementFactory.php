<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type'=>'paid',
            'title'=>fake()->text(150),
            'description'=>fake()->text(1000),
            'advertiser'=>1,
            'category'=>Category::inRandomOrder()->first()->id,
            'tags'=>json_encode(['PHP'])
        ];
    }
}
