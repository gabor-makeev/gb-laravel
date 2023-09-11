<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    use GetNewsData;

    public function index(string $category = null): View
    {
        if ($category) {
            $news = $this->getNewsByCategory($category);
        } else {
            $news = $this->getAllNews();
        }

        return view('news.index', [
            'news' => $news,
            'category' => $category
        ]);
    }

    public function show(string $category, int $id): View
    {
        return view('news.show', ['post' => $this->findNews($category, $id)]);
    }

    public function create(): View
    {
        return view('news.create');
    }
}
