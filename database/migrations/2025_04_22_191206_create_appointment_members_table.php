<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentMembersTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_group_id')
                  ->constrained('appointment_groups')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('whatsapp');
            $table->string('tower');
            $table->string('block');
            $table->string('apartment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_members');
    }
}
