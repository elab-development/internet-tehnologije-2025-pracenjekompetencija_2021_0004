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
        Schema::create('prilozi', function (Blueprint $table) {
            $table->id('prilog_id');
            $table->string('putanja_fajla');
            $table->foreignId('stavka_id')->constrained('stavke','stavka_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prilozi');
    }
};
