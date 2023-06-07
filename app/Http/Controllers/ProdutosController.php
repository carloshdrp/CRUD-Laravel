<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('dashboard.products');
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

    public function show(Produtos $produtos, $id)
    {
        $product = DB::table('produtos')->where('id', $id)->first();
        if(empty($product)){
            return redirect('/catalogo');
        }
        return view('product', [
            'product' => $product,
        ]);
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
