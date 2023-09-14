<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
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
        return view('admin.news.create')->with('categories', DB::table('categories')->get());
    }

    public function store(Request $request): RedirectResponse
    {
        $post = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category'),
            'created_at' => now()
        ];

        $postId = DB::table('news')->insertGetId($post);

        return redirect(route('news.show', [
            'categoryId' => $post['category_id'],
            'postId' => $postId
        ]));
    }
}
