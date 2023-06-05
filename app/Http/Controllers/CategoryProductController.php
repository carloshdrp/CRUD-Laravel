<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        return CategoryProduct::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
        ]);

        return CategoryProduct::create($request->validated());
    }

    public function show(CategoryProduct $categoryProduct)
    {
        return $categoryProduct;
    }

    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        $request->validate([
            'category_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
        ]);

        $categoryProduct->update($request->validated());

        return $categoryProduct;
    }

    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->delete();

        return response()->json();
    }
}
