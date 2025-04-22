@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Editar Grupo: {{ \$appointmentGroup->service_name }}</h1>
    <form action="{{ route('appointment-groups.update', \$appointmentGroup) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="service_name" class="form-label">Serviço</label>
            <input type="text" name="service_name" id="service_name" class="form-control" value="{{ \$appointmentGroup->service_name }}" required>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ \$appointmentGroup->date }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="shift" class="form-label">Turno</label>
                <select name="shift" id="shift" class="form-select" required>
                    @foreach(['Manhã','Tarde','Noite'] as \$s)
                        <option value="{{ \$s }}" {{ \$appointmentGroup->shift === \$s ? 'selected' : '' }}>{{ \$s }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="min_members" class="form-label">Min. Moradores</label>
                <input type="number" name="min_members" id="min_members" class="form-control" value="{{ \$appointmentGroup->min_members }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('appointment-groups.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
