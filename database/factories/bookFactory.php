<?php

namespace Database\Factories;

use App\Models\book;
use App\Models\category;
use App\Models\auther;
use App\Models\publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'category_id' => category::inRandomOrder()->first()->id,
            'auther_id' => auther::inRandomOrder()->first()->id,
            'publisher_id' => publisher::inRandomOrder()->first()->id,
            'status' => 'Y',
            'cover_image' => 'default.jpg',
        ];
    }
}
