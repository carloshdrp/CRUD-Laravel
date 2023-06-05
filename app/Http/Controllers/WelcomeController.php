<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produtos;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', data: [
            'userCount' => User::count(),
            'categoriesCount' => Category::count(),
            'itemsCount' => Produtos::count(),
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
