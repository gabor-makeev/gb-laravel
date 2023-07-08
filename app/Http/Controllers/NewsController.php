<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(string $categoryId): View
    {
        $newsModel = app(News::class);
        $categoryModel = app(Category::class);

        return view('news.index', [
            'category' => $categoryModel->getCategoryById($categoryId),
            'articles' => $newsModel->getNewsByCategory($categoryId)
        ]);
    }

    public function show($newsId): View
    {
        $model = app(News::class);

        return view('news.show', [
            'article' => $model->getNewsById($newsId)
        ]);
    }
}
