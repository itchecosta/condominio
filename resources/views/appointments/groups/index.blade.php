@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Grupos de Agendamento</h1>
        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('appointment-groups.create') }}" class="btn btn-primary">Novo Grupo</a>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="groupsTable">
            <thead class="table-dark">
                <tr>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Turno</th>
                    <th>Min. Moradores</th>
                    <th>Inscritos</th>
                    <th>Status</th>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <th>Ações</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->service_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($group->date)->format('d/m/Y') }}</td>
                    <td>{{ $group->shift }}</td>
                    <td>{{ $group->min_members }}</td>
                    <td>{{ $group->members_count }}</td>
                    <td>{{ ucfirst($group->status) }}</td>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('appointment-groups.show', $group) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('appointment-groups.edit', $group) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('appointment-groups.destroy', $group) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Confirmar exclusão?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection