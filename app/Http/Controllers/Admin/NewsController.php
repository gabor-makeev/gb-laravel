<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetNewsData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    use GetNewsData;

    public function index(): View
    {
        $news = DB::table('news')
            ->join('categories', 'categories.id', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')
            ->get();

        return view('admin.news.index')->with('news', $news);
    }

    public function create(): View
    {
        return view('admin.news.create')->with('categories', $this->getNewsCategories());
    }

    public function store(Request $request): RedirectResponse
    {
        $news = [
            'uuid' => (string) Str::uuid(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
        ];

        $this->saveNews($news);

        return redirect(route('news.show', [
            'category' => $news['category'],
            'uuid' => $news['uuid']
        ]));
    }
}
