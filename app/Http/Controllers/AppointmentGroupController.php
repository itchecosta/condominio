<?php

// app/Http/Controllers/AppointmentGroupController.php
namespace App\Http\Controllers;

use App\Models\AppointmentGroup;
use Illuminate\Http\Request;

class AppointmentGroupController extends Controller
{
    public function index()
    {
        $groups = AppointmentGroup::withCount('members')->get();
        return view('appointments.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('appointments.groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_name' => 'required|string',
            'date'         => 'required|date',
            'shift'        => 'required|in:Manhã,Tarde,Noite',
            'min_members'  => 'required|integer|min:1',
        ]);
        AppointmentGroup::create($data);
        return redirect()->route('appointment-groups.index')
                         ->with('success','Grupo criado!');
    }

    public function show(AppointmentGroup $appointmentGroup)
    {
        $appointmentGroup->load('members');
        return view('appointments.groups.show', compact('appointmentGroup'));
    }

    // editar/atualizar e destruir conforme necessidade...
}
