<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->only(['name']);
        $category = new Category($data);

        try {
            $category->save();

            return redirect(route('admin.categories.index'))->with('success', 'Category successfully created');
        } catch (QueryException) {
            return back()->with('error', 'Category was not created! Please try again.');
        }
    }
}
