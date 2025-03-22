<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(); // Referência para a categoria
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            // Endereço estruturado
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            // Outros campos
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('working_hours')->nullable();
            $table->boolean('status')->default(true); // true = ativo, false = inativo
            // Para integração com mapas
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();

            // Foreign key para a categoria
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
