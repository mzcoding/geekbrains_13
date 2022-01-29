<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$title = $this->faker->jobTitle();
        return [
            'title'  => $title,
			'slug'   => \Str::slug($title),
			'author' => $this->faker->userName(),
			'status' => 'ACTIVE',
			'description' => $this->faker->text(150)
        ];
    }
}
