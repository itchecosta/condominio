@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>{{ $provider->name }}</h2>
    <p>{{ $provider->description }}</p>
    <p><strong>Telefone:</strong> {{ $provider->phone }}</p>
    <p><strong>Email:</strong> {{ $provider->email }}</p>
    <p><strong>Média do Orçamento:</strong> 
       {{ $provider->averageQuote() ? number_format($provider->averageQuote(), 2, ',', '.') : 'Sem orçamento' }}
    </p>
</div>

<hr>

<h4>Avaliações</h4>
@foreach($provider->reviews as $review)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Nota: {{ $review->rating }} / 5</h5>
            <p class="card-text">{{ $review->comment }}</p>
            @if($review->quote_value)
              <p class="card-text"><strong>Orçamento:</strong> R$ {{ number_format($review->quote_value, 2, ',', '.') }}</p>
            @endif
            <p class="card-text"><small class="text-muted">Avaliado por: {{ $review->user->name }}</small></p>
        </div>
    </div>
@endforeach

<hr>

<h4>Deixe sua Avaliação</h4>
<form action="{{ route('reviews.store', $provider->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="rating" class="form-label">Nota (1 a 5)</label>
        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
    </div>
    <div class="mb-3">
        <label for="quote_value" class="form-label">Orçamento (R$)</label>
        <input type="number" name="quote_value" id="quote_value" class="form-control" step="0.01">
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Comentário</label>
        <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Enviar Avaliação</button>
</form>
@endsection
