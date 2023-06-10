<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories', data: [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories-form', data: [
            'categories' => Category::all(),
            'edit' => false,
        ]);
    }

    public function edit(Category $category, $id)
    {
        return view('dashboard.categories-form', data: [
            'edit' => Category::where('id', '=', $id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->validate();
            $category->save();

            return redirect()->route('dashboard.categories')->with('success', 'Categoria criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->validate();
            $category->save();

            return redirect()->route('dashboard.categories')->with('success', 'Categoria atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy(Category $category, $id)
    {
        $category->where('id', '=', $id)->delete();

        return redirect()->route('dashboard.categories')->with('success', 'Categoria '.$category->name.' removida com sucesso!');
    }
}
