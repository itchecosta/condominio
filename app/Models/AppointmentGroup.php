<?php

// app/Models/AppointmentGroup.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentGroup extends Model
{
    protected $fillable = [
        'service_name','date','shift','min_members','status'
    ];

    public function members()
    {
        return $this->hasMany(AppointmentMember::class);
    }

    // Verifica se já atingiu o mínimo
    public function isReady(): bool
    {
        return $this->members()->count() >= $this->min_members;
    }
}
