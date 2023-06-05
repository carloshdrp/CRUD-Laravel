<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return Produtos::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        return Produtos::create($request->validated());
    }

    public function show(Produtos $produtos)
    {
        return $produtos;
    }

    public function update(Request $request, Produtos $produtos)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        $produtos->update($request->validated());

        return $produtos;
    }

    public function destroy(Produtos $produtos)
    {
        $produtos->delete();

        return response()->json();
    }
}
