<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $response = [];

        for ($i = 0; $i < 5; $i++) {
            $response[] = [
                'name' => 'Category #' . $i,
                'description' => fake()->text(100)
            ];
        }

        return $response;
    }
}
