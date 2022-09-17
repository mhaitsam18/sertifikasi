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
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('periode')->nullable();
            $table->string('nama_penyelenggara')->nullable();
            $table->text('deskripsi');
            $table->foreignId('prodi_id')->nullable()
                ->constrained('prodi')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->foreignId('kategori_acara_id')->nullable()
                ->constrained('kategori_acara')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->dateTime('pendaftaran_buka');
            $table->dateTime('pendaftaran_tutup');
            $table->dateTime('pelaksanaan_buka');
            $table->dateTime('pelaksanaan_tutup');
            $table->string('link_pendaftaran')->nullable();
            $table->string('lokasi');
            $table->float('biaya', 16, 2);
            $table->integer('kuota');
            $table->foreignId('status_acara_id')->nullable()
                ->constrained('status_acara')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->foreignId('koordinator_id')->nullable()
                ->constrained('dosen')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->string('thumbnail');
            $table->boolean('is_valid')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acara');
    }
};
