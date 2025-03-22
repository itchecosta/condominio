@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Fornecedores</h1>
    @if(auth()->check() && auth()->user()->role == 'admin')
        <a href="{{ route('providers.create') }}" class="btn btn-primary">Adicionar Fornecedor</a>
    @endif
</div>

<!-- Filtro por Categoria: o form envia via GET -->
<form id="categoryFilterForm" class="mb-3" method="GET" action="{{ route('providers.index') }}">
    <label for="categoryFilter" class="form-label">Filtrar por Categoria:</label>
    <select id="categoryFilter" name="category" class="form-select d-inline-block" style="width: 200px;">
        <option value="">Todos</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-secondary">Filtrar</button>
</form>

<table class="table table-striped" id="providersTable">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Descrição</th>
            {{-- <th>Média Orçamento</th> --}}
            @if(auth()->check() && auth()->user()->role == 'admin')
                <th>Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($providers as $provider)
        <tr>
            <td>{{ $provider->category ? $provider->category->name : '' }}</td>
            <td>{{ $provider->name }}</td>
            <td>
                @php
                    // Separa os números pelo caractere '/'
                    $phones = explode('/', $provider->phone);
                    // Mensagem padrão para o WhatsApp
                    $defaultMessage = "Olá, tudo bem? Gostaria de fazer um orçamento!";
                @endphp
            
                @foreach($phones as $phone)
                    @php
                        // Remove espaços e outros caracteres não numéricos
                        $phoneTrim = trim($phone);
                        $cleanPhone = preg_replace('/\D/', '', $phoneTrim);
                        // Constrói a URL do WhatsApp com a mensagem (lembre-se de que, se necessário, inclua o código do país)
                        $whatsAppUrl = "https://wa.me/55{$cleanPhone}?text=" . urlencode($defaultMessage);
                    @endphp
            
                    <a href="{{ $whatsAppUrl }}" target="_blank" class="btn btn-success btn-sm mb-1">
                        WhatsApp ({{ $phoneTrim }})
                    </a>
                @endforeach
            </td>
            
            <td>{{ $provider->description }}</td>
            {{-- <td>{{ $provider->averageQuote() ? number_format($provider->averageQuote(), 2, ',', '.') : '0,00' }}</td> --}}
            @if(auth()->check() && auth()->user()->role == 'admin')
            <td>
                <a href="{{ route('providers.show', $provider->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
    <!-- DataTables CSS para Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <!-- jQuery e DataTables JS para Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#providersTable').DataTable({
            paging: true,
            language: {
                search: "Pesquisar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                paginate: {
                    previous: "Anterior",
                    next: "Próximo"
                },
            }
        });
    });
    </script>
@endsection
