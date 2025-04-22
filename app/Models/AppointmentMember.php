<?php

// app/Models/AppointmentMember.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentMember extends Model
{
    protected $fillable = [
        'appointment_group_id','name','whatsapp','tower','block','apartment'
    ];

    public function group()
    {
        return $this->belongsTo(AppointmentGroup::class);
    }
}
