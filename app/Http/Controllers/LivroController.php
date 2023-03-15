<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\LivroModel;

class LivroController extends Controller
{

    public function index()
    {
        $livros = LivroModel::all();

        if (!$livros) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao recuperar os registros de livros',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $livros,
        ], 200);
    }

    public function show(LivroModel $livro)
    {
        if (!$livro) {
            return response()->json([
                'success' => false,
                'message' => 'Livro não encontrado',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $livro,
        ]);
    }

    public function store(LivroRequest $request)
    {
        $livro = LivroModel::create($request->all());

        if (!$livro) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar livro',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Livro criado com sucesso!',
            'data' => $livro,
        ], 201);
    }

    public function update(LivroRequest $request, LivroModel $livro)
    {
        $livro->update($request->all());

        if (!$livro) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar livro',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Livro atualizado com sucesso',
            'data' => $livro,
        ], 200);
    }

    public function destroy(LivroModel $livro)
    {
        $deleted = $livro->delete();

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao deletar livro',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Livro deletado com sucesso',
            'data' => [],
        ], 200);
    }
}
