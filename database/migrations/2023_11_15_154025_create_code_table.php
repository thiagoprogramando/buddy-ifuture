<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('code', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('type'); // 1 - Recuperação
            $table->string('code');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('code');
    }
};
