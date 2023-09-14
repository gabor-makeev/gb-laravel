<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
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
        DB::table('categories')->insert([
            'name' => $request['name'],
            'created_at' => now()
        ]);

        return redirect(route('admin.categories.index'));
    }
}
