<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('query')) {
            $query = $request->input('query');
            $categories = Category::where('name', 'LIKE', "%$query%")->paginate(10);
        } else {
            $categories = Category::paginate(10);
        }
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Category::class, 'not_regex:/<script\b[^>]*>(.*?)<\/script>/i'],
        ]);

        $insert = Category::create($validatedData);

        if ($insert) {
            return redirect()->route('admin.categories.index')->with('success', 'Kategori ' . $request->name . ' berhasil ditambahkan');
        }

        return redirect()->back()->with('danger', 'Kategori gagal ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => "required",
        ]);

        $category->update([
            "name" => $request->name,
        ]);

        return to_route('admin.categories.index')->with('edit', 'Edit Category Success');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return to_route('admin.categories.index')->with('delete', 'Delete Category Success');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
