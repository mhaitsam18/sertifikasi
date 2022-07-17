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
        Schema::create('jadwal_acara', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('acara_id')
            //     ->constrained('acara')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // // ->nullOnDelete();
            $table->foreignId('kelas_acara_id')
                ->constrained('kelas_acara')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // ->nullOnDelete();
            $table->foreignId('instruktur_id')
                ->constrained('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // ->nullOnDelete();
            // $table->string('kelas');
            $table->string('ruangan');
            $table->string('link');
            $table->string('materi');
            $table->date('tanggal');
            $table->time('waktu_dimulai');
            $table->time('waktu_selesai');
            $table->foreignId('status_jadwal_id')
                ->constrained('status_jadwal')
                ->onUpdate('cascade')
                ->onDelete('cascade')->default(1);
            // ->nullOnDelete();
            $table->string('keterangan');
            $table->boolean('is_ujian')->default(0);
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
        Schema::dropIfExists('jadwal_acara');
    }
};
