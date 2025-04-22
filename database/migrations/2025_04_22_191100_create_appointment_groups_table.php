<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_groups', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');          // e.g. "Instalação de Gás"
            $table->date('date');                   // data do agendamento
            $table->enum('shift', ['Manhã','Tarde','Noite']);
            $table->unsignedSmallInteger('min_members')->default(5);
            $table->enum('status', ['pending','confirmed','cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_groups');
    }
}

