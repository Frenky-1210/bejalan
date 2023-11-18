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
        if (!Schema::hasTable('pesanans')) {
            Schema::create('pesanans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('wisata_id')->constrained();
                $table->foreignId('tour_id')->constrained();
                $table->date('jadwal');
                $table->time('waktu_start');
                $table->time('waktu_end');
                $table->string('fasilitas');
                $table->string('biaya');
                $table->string('kuota');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
