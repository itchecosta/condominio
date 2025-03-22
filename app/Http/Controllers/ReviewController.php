<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Provider $provider)
    {
        $request->validate([
            'rating'      => 'required|integer|min:1|max:5',
            'quote_value' => 'nullable|numeric',
            'comment'     => 'nullable|string',
        ]);

        Review::create([
            'user_id'     => Auth::id(),
            'provider_id' => $provider->id,
            'rating'      => $request->rating,
            'quote_value' => $request->quote_value,
            'comment'     => $request->comment,
        ]);

        return redirect()->route('providers.show', $provider->id)
                         ->with('success', 'Avaliação adicionada com sucesso.');
    }
}
