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
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_acara_id')->nullable()
                ->constrained('jadwal_acara')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->integer('total_peserta');
            $table->integer('total_kehadiran');
            $table->integer('total_izin');
            $table->integer('total_alpa');
            $table->string('catatan');
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('berita_acara');
    }
};
