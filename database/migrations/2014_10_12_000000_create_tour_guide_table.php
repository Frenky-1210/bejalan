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
        Schema::create('tour_guide', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tourguide');
            $table->string('umur');
            $table->string('jenis_kelamin');
            $table->string('pengalaman');
            $table->string('no_telp');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_guide');
    }
};
