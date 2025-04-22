@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Novo Grupo de Agendamento</h1>
    <form action="{{ route('appointment-groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="service_name" class="form-label">Serviço</label>
            <input type="text" name="service_name" id="service_name" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="shift" class="form-label">Turno</label>
                <select name="shift" id="shift" class="form-select" required>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="min_members" class="form-label">Min. Moradores</label>
                <input type="number" name="min_members" id="min_members" class="form-control" value="5" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('appointment-groups.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
