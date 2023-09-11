<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;

trait GetNewsData {
    private array $categories = ['movies', 'tv series', 'music', 'video games', 'off-topic'];

    protected function getNewsCategories(): array
    {
        $categories = [];
        $this->handleDatabaseFileCreation(base_path('database') . "/categories.csv", 'uuid,name');
        $source = fopen(base_path('database') . "/categories.csv", 'r');

        $isFirstLine = true;

        while ($data = fgetcsv($source)) {
            if ($isFirstLine) {
                $keys = $data;
                $isFirstLine = false;
                continue;
            }

            if (isset($keys)) {
                $categories[] = array_combine($keys, $data);
            }
        }

        return $categories ?? [];
    }

    protected function getAllNews(): array
    {
        $news = [];
        $this->handleDatabaseFileCreation(base_path('database') . "/news.csv", 'uuid,title,content,description,category');
        $source = fopen(base_path('database') . "/news.csv", 'r');
        $isFirstLine = true;

        while ($data = fgetcsv($source)) {
            if ($isFirstLine) {
                $keys = $data;
                $isFirstLine = false;
                continue;
            }

            if (isset($keys)) {
                $news[] = array_combine($keys, $data);
            }
        }

        return $news;
    }

    protected function getNewsByCategory(string $category): array
    {
        $news = [];
        $this->handleDatabaseFileCreation(base_path('database') . "/news.csv", 'uuid,title,content,description,category');
        $source = fopen(base_path('database') . "/news.csv", 'r');
        $isFirstLine = true;

        while ($data = fgetcsv($source)) {
            if ($isFirstLine) {
                $keys = $data;
                $isFirstLine = false;
                continue;
            }

            if (isset($keys)) {
                $newsItem = array_combine($keys, $data);
                if ($newsItem['category'] === $category) {
                    $news[] = $newsItem;
                }
            }
        }

        return $news ?? [];
    }

    protected function findNews(string $uuid): ?array
    {
        $this->handleDatabaseFileCreation(base_path('database') . "/news.csv", 'uuid,title,content,description,category');
        $source = fopen(base_path('database') . "/news.csv", 'r');

        $isFirstLine = true;

        while ($data = fgetcsv($source)) {
            if ($isFirstLine) {
                $keys = $data;
                $isFirstLine = false;
                continue;
            }

            if (isset($keys)) {
                $newsItem = array_combine($keys, $data);
                if ($newsItem['uuid'] === $uuid) {
                    return $newsItem;
                }
            }
        }

        return null;
    }

    #[NoReturn] protected function saveNews(array $news): void
    {
        $databaseFileName = 'news.csv';
        $databaseFilePath = base_path('database') . "/$databaseFileName";

        $this->handleDatabaseFileCreation($databaseFilePath, 'uuid,title,content,description,category');

        File::append(
            $databaseFilePath,
            "\n{$news['uuid']},{$news['title']},{$news['content']},{$news['description']},{$news['category']}"
        );
    }

    #[NoReturn] protected function saveCategory(array $category): void
    {
        $databaseFileName = 'categories.csv';
        $databaseFilePath = base_path('database') . "/$databaseFileName";

        $this->handleDatabaseFileCreation($databaseFilePath, 'uuid,name');

        $categoryName = strtolower($category['name']);

        File::append(
            $databaseFilePath,
            "\n{$category['uuid']},{$categoryName}"
        );
    }

    private function handleDatabaseFileCreation(string $path, string $content): void
    {
        if (!File::exists($path)) {
            File::put(
                $path,
                $content);
        }
    }
}
