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

    public function edit(News $post): View
    {
        return view('admin.news.edit')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('statuses', Status::getEnums());
    }

    public function update(Request $request, News $post): RedirectResponse
    {
        $data = $request->only([
            'title',
            'description',
            'content',
            'status',
            'author'
        ]);
        $data['category_id'] = $request->input(['category']);
        $postImage = $request->file('image');

        $post->fill($data);

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
            return back()->with('error', 'The news post was not edited! Please try again.');
        }
    }

    public function destroy(News $post): RedirectResponse
    {
        try {
            $post->delete();

            return redirect(route('admin.news.index'))->with('success', 'Post successfully deleted');
        } catch (QueryException) {
            return back()->with('error', 'Post was not deleted! Please try again.');
        }
    }
}
