<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news_categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $categoryIds = \DB::table('categories')
            ->orderBy('id', 'asc')
            ->pluck('id')
            ->toArray();

        $newsIds = \DB::table('news')
            ->orderBy('id', 'asc')
            ->pluck('id')
            ->toArray();

        $response = [];

        foreach ($categoryIds as $key => $value) {
            for ($i = 0; $i < 10; $i++) {
                $response[] = [
                    'news_id' => $newsIds[(int)($key . $i)],
                    'category_id' => $value
                ];
            }
        }

        return $response;
    }
}
