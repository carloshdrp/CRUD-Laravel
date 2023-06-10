<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('dashboard.products', data: [
            'products' => Produtos::all(),
        ]);
    }
    public function create()
    {
        return view('dashboard.products-form', data: [
            'products' => Produtos::all(),
            'tags' => Category::all(),
            'edit' => false,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $product = new Produtos();
            $product->title = $request->title;
            $product->description = $request->description;

            if ($request->hasFile('formFile')) {
                $imagem = $request->formFile;
                $caminhoImagem = $imagem->store('imagens_produtos', 'public');
                $product->image = 'storage/'.$caminhoImagem;
            }

            $product->save();

            $selectedTags = $request->input('tags', []);

            $product->categories()->attach($selectedTags);

            return redirect()->route('dashboard.products')->with('success', 'Produto criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function show(Produtos $produtos, $id)
    {
        $product = Produtos::findOrFail($id);
        if(empty($product)){
            return redirect('/catalogo');
        }
        return view('product', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Produtos $produtos, $id)
    {
        try {
            $product = Produtos::findOrFail($id);
            $product->title = $request->title;
            $product->description = $request->description;

            if ($request->hasFile('formFile')) {
                $imagem = $request->formFile;
                $caminhoImagem = $imagem->store('imagens_produtos', 'public');
                $product->image = 'storage/'.$caminhoImagem;
            }

            $product->save();

            $selectedTags = $request->input('categories', []);

            $product->categories()->sync($selectedTags);

            return redirect()->route('dashboard.products')->with('success', 'Produto alterado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy(Produtos $produtos, $id)
    {
        $produtos->where('id', '=', $id)->delete();

        return redirect()->route('dashboard.products')->with('success', 'Produto '.$produtos->title.' removido com sucesso!');
    }

    public function edit(Produtos $produtos, $id)
    {
        return view('dashboard.products-form', data: [
            'edit' => Produtos::with('categories')->findOrFail($id),
            'categories' => Category::all(),
        ]);
    }
}
