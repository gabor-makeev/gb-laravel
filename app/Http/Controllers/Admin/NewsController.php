<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::paginate(10);

        return view('admin.news.index')->with('news', $news);
    }

    public function create(): View
    {
        return view('admin.news.create')
            ->with('categories', Category::all())
            ->with('statuses', Status::getEnums());
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->only([
            'title',
            'description',
            'content',
            'status',
            'author'
        ]);
        $data['category_id'] = $request->input(['category']);
        $post = new News($data);
        $postImage = $request->file('image');

        if ($postImage) {
            $postImage->move(public_path('storage'), $postImage->getClientOriginalName());

            $post->image_url = 'storage/' . $postImage->getClientOriginalName();
        }

        try {
            $post->save();

            return redirect(route('news.show', [
                'categoryId' => $post->category->id,
                'postId' => $post->id
            ]));
        } catch (QueryException) {
            return back()->with('error', 'The news post was not created! Please try again.');
        }
    }
}
