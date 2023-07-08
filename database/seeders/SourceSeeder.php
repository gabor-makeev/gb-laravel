<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $response = [];

        for ($i = 0; $i < 10; $i++) {
            $response[] = [
                'url' => fake()->url()
            ];
        }

        return $response;
    }
}
