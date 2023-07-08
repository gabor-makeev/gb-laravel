<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{
    public function index(): View
    {
        $model = app(Category::class);

        return view('categories.index', ['categories' => $model->getCategories()]);
    }
}
