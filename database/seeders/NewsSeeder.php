<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getNews());
    }

    private function getNews(): array
    {
        $newsCount = 5;
        $seedCategoriesIds = [1, 2, 3, 4];
        $news = [];

        foreach ($seedCategoriesIds as $seedCategoryId) {
            for ($i = 1; $i <= $newsCount; $i++) {
                $news[] = [
                    'title' => fake()->text(100),
                    'description' => fake()->text(1000),
                    'content' => fake()->text(10000),
                    'category_id' => $seedCategoryId,
                    'created_at' => now()
                ];
            }
        }

        return $news;
    }
}
