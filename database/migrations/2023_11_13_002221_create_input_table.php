<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('input', function (Blueprint $table) {
            $table->id();
            $table->integer('id_form'); 
            $table->string('title');
            $table->longText('description');
            $table->string('name');
            $table->integer('type');
            $table->integer('size');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('inputForm');
    }
};
