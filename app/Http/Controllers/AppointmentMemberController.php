<?php

// app/Http/Controllers/AppointmentMemberController.php
namespace App\Http\Controllers;

use App\Models\AppointmentGroup;
use App\Models\AppointmentMember;
use Illuminate\Http\Request;

class AppointmentMemberController extends Controller
{
    public function store(Request $request, AppointmentGroup $appointmentGroup)
    {
        $data = $request->validate([
            'name'       => 'required|string',
            'whatsapp'   => 'required|string',
            'tower'      => 'required|string',
            'block'      => 'required|string',
            'apartment'  => 'required|string',
        ]);
        $appointmentGroup->members()->create($data);
        return back()->with('success','Inscrição adicionada!');
    }
}

