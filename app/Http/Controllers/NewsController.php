<?php

namespace App\Http\Controllers;

use App\Enums\News\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(int $categoryId = null): View
    {
        $categoryName = 'All';

        if ($categoryId) {
            $news = DB::table('news')
                ->where('category_id', $categoryId)
                ->where('status', Status::ACTIVE->value)
                ->get();
            $category = DB::table('categories')->find($categoryId);
            $categoryName = $category->name;
        } else {
            $news = DB::table('news')->get();
        }

        return view('news.index', [
            'news' => $news,
            'categoryName' => $categoryName
        ]);
    }

    public function show(string $categoryId, string $postId): View
    {
        $category = DB::table('categories')->find($categoryId);
        $post = DB::table('news')->where('status', Status::ACTIVE->value)->find($postId);

        if (!$post) {
            abort(404);
        }

        return view('news.show', ['categoryName' => $category->name, 'post' => $post]);
    }
}
