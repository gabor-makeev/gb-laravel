<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use GetNewsData;

    public function index(): View
    {
        $categories = DB::table('categories')->get();

        return view('category.index', ['categories' => $categories]);
    }
}
