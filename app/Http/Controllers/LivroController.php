<?php

namespace App\Http\Controllers;

use App\Models\LivroModel;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function index()
    {
        return LivroModel::all();
    }

    public function show(LivroModel $livro)
    {
        return $livro;
    }

    public function store(Request $request)
    {
        return LivroModel::create($request->all());
    }

    public function update(Request $request, LivroModel $livro)
    {
        $livro->update($request->all());
        return $livro;
    }

    public function destroy(LivroModel $livro)
    {
        return $livro->delete();
    }
}
