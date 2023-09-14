<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetNewsData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use GetNewsData;

    public function index(): View
    {
        $categories = DB::table('categories')->get();

        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $category = [
            'uuid' => (string) Str::uuid(),
            'name' => $request->input('name'),
        ];

        $this->saveCategory($category);

        return redirect(route('admin.categories.index'));
    }
}
