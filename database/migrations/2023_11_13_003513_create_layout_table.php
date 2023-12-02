<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('layout', function (Blueprint $table) {
            $table->id();
            $table->integer('id_form');
            $table->longText('content')->nullable();
            $table->longText('content_clean')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('layoutForm');
    }
};
