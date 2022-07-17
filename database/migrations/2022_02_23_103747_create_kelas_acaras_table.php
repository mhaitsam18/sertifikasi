<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id')
                ->constrained('acara')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('instruktur_id')
                ->constrained('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nama');
            $table->integer('kuota');
            // ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_acara');
    }
};
