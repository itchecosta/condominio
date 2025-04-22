@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Grupo: {{ \$appointmentGroup->service_name }}</h1>
        <span class="badge bg-info text-dark">
            Inscritos: {{ \$appointmentGroup->members->count() }} / {{ \$appointmentGroup->min_members }}
        </span>
    </div>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse(\$appointmentGroup->date)->format('d/m/Y') }} &bull; <strong>Turno:</strong> {{ \$appointmentGroup->shift }}</p>

    {{-- Lista de membros --}}
    <div class="card mb-4">
        <div class="card-header">Membros Inscritos</div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>WhatsApp</th>
                        <th>Torre</th>
                        <th>Bloco</th>
                        <th>Apto</th>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <th>Ações</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @foreach(\$appointmentGroup->members as \$member)
                    <tr>
                        <td>{{ \$member->name }}</td>
                        <td>{{ \$member->whatsapp }}</td>
                        <td>{{ \$member->tower }}</td>
                        <td>{{ \$member->block }}</td>
                        <td>{{ \$member->apartment }}</td>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <form action="{{ route('appointment-members.destroy', [\$appointmentGroup, \$member]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Remover membro?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Formulário para adicionar membro --}}
    <div class="card">
        <div class="card-header">Inscrever Morador</div>
        <div class="card-body">
            <form action="{{ route('appointment-groups.members.store', \$appointmentGroup) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="whatsapp" class="form-label">WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="tower" class="form-label">Torre</label>
                        <input type="text" name="tower" id="tower" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="block" class="form-label">Bloco</label>
                        <input type="text" name="block" id="block" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="apartment" class="form-label">Apto</label>
                        <input type="text" name="apartment" id="apartment" class="form-control" required>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Inscrever</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
