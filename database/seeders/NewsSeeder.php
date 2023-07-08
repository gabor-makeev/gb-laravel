<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $statusIds = \DB::table('statuses')
            ->orderBy('id', 'asc')
            ->pluck('id')
            ->toArray();

        $sourceIds = \DB::table('sources')
            ->orderBy('id', 'asc')
            ->pluck('id')
            ->toArray();

        $categoriesCount = \DB::table('categories')->count();
        $newsCount = $categoriesCount * 10;

        $response = [];

        for ($i = 0; $i < $newsCount; $i++) {
            $response[] = [
                'title' => 'News #' . $i,
                'content' => fake()->text(500),
                'preview_content' => fake()->text(100),
                'status_id' => $statusIds[array_rand($statusIds)],
                'source_id' => $sourceIds[array_rand($sourceIds)]
            ];
        }

        return $response;
    }
}
