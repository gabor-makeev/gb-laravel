<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetNewsData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use GetNewsData;

    public function index(): View
    {
        return view('admin.categories.index')->with('categories', $this->getNewsCategories());
    }
}
