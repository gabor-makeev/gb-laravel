<?php

namespace App\Http\Controllers;

trait GetNewsData {
    private array $categories = ['movies', 'tv series', 'music', 'video games', 'off-topic'];

    protected function getNewsCategories(): array
    {
        return $this->categories;
    }

    protected function getAllNews(): array
    {
        $newsQuantity = 4;
        $news = [];

        foreach ($this->categories as $category) {
            for ($i = 1; $i <= $newsQuantity; $i++) {
                $news[] = [
                    'id' => $i,
                    'title' => fake()->text(100),
                    'content' => fake()->text(1000),
                    'description' => fake()->text(150),
                    'category' => $category
                ];
            }
        }

        return $news;
    }

    protected function getNewsByCategory(string $category): array
    {
        $newsQuantity = 4;
        $news = [];

        for ($i = 1; $i <= $newsQuantity; $i++) {
            $news[] = [
                'id' => $i,
                'title' => fake()->text(100),
                'content' => fake()->text(1000),
                'description' => fake()->text(150),
                'category' => $category
            ];
        }

        return $news;
    }

    protected function findNews(string $category, int $id): array
    {
        return [
            'id' => $id,
            'title' => fake()->text(100),
            'content' => fake()->text(1000),
            'description' => fake()->text(150),
            'category' => $category
        ];
    }
}
