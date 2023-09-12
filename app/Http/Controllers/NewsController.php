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

    public function show(string $category, string $uuid): View
    {
        $post = $this->findNews($uuid);

        if (!$post) {
            abort(404);
        }

        return view('news.show', ['category' => $category, 'post' => $post]);
    }
}
