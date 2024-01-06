<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('repertoire_id');
            $table->unsignedBigInteger('seats_number');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('repertoire_id')->references('id')->on('repertoires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
