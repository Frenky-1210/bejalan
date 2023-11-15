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
        Schema::create('translator', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('native_language');
            $table->string('language_skill');
            $table->string('experience');
            $table->string('contact');
            $table->string('picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translator');
    }
};
