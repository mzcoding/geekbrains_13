<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('news')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 10; $i++) {
			$title = $faker->sentence(mt_rand(3,10));
			$data[] = [
				'category_id' => 1,
				'title' => $title,
				'slug'  => \Str::slug($title),
				'description' => $faker->text(mt_rand(100, 200))
			];
		}

		return $data;
	}
}
