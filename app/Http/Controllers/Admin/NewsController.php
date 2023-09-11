<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetNewsData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    use GetNewsData;

    public function index(): View
    {
        return view('admin.news.index')->with('newsList', $this->getAllNews());
    }

    public function create(): View
    {
        return view('admin.news.create');
    }
}
