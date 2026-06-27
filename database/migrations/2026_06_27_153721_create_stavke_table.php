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
        Schema::create('stavke', function (Blueprint $table) {
            $table->id('stavka_id');
            $table->string('naziv');
            $table->text('opis')->nullable();
            $table->enum('tip', ['kompetencija','sertifikat']);
            $table->enum('status',['na_cekanju','odobreno','odbijeno'])->default('na_cekanju');
            $table->foreignId('korisnik_id')->constrained('korisnici','korisnik_id')->onDelete('cascade');
            $table->foreignId('kategorija_id')->constrained('kategorije','kategorija_id')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stavke');
    }
};
