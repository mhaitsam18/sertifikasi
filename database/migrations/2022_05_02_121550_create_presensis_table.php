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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')
                ->constrained('peserta')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('berita_acara_id')
                ->constrained('berita_acara')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('is_present')->default(true);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('presensi');
    }
};
