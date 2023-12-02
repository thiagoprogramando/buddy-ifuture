<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->integer('id_creator');
            $table->string('cpf_or_cnpj_creator');
            $table->string('title');
            $table->longText('description');
            $table->string('format');
            $table->integer('spacing');
            $table->integer('size');
            $table->integer('margin'); 
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('form');
    }
};
