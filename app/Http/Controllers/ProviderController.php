<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $query = Provider::with('category');

        // Se houver o parâmetro 'category', filtra os fornecedores que possuam essa categoria
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $providers = $query->get();
        $categories = \App\Models\Category::all();

        return view('providers.index', compact('providers', 'categories'));
    }


    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // outras validações conforme necessário
        ]);

        Provider::create($request->all());
        return redirect()->route('providers.index')->with('success', 'Fornecedor criado com sucesso.');
    }

    public function show(Provider $provider)
    {
        // Carrega as avaliações relacionadas
        $provider->load('reviews.user');
        return view('providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => 'required',
            // outras validações
        ]);

        $provider->update($request->all());
        return redirect()->route('providers.index')->with('success', 'Fornecedor atualizado com sucesso.');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index')->with('success', 'Fornecedor removido com sucesso.');
    }
}
