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
        Schema::create('profili', function (Blueprint $table) {
            $table->id('profil_id');
            $table->foreignId('korisnik_id')->unique()->constrained('korisnici','korisnik_id')->onDelete('cascade');
            $table->string('ime');
            $table->string('prezime');
            $table->text('bio')->nullable();
            $table->string('titula')->nullable();
            $table->string('putanja_slike')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profili');
    }
};
