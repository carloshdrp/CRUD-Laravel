<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Produtos;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        $products = Produtos::paginate(10);
        return view('catalogo', data: [
            'products' => $products,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
