<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNewsByCategory($categoryId): Collection
    {
        $newsIds = DB::table('news_categories')
            ->where('category_id', '=', $categoryId)
            ->pluck('news_id')
            ->toArray();

        return DB::table($this->table)
            ->whereIn('id', $newsIds)
            ->orderBy('id')
            ->get();
    }

    public function getNewsById($id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}
