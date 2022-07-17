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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')
            //     ->constrained('users')
            //     ->onUpdate('cascade')
            //     // ->onDelete('cascade');
            //     ->nullOnDelete();
            $table->foreignId('mahasiswa_id')->nullable()
                ->constrained('mahasiswa')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->foreignId('acara_id')->nullable()
                ->constrained('acara')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            // $table->string('kode_peserta')->nullable()->unique();
            $table->float('tagihan', 16, 2);
            $table->float('sisa_tagihan', 16, 2);
            $table->foreignId('status_peserta_id')->nullable()
                ->default(1)
                ->constrained('status_peserta')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            // $table->string('token');
            $table->foreignId('kelas_acara_id')->nullable()
                ->nullable()
                ->constrained('kelas_acara')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
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
        Schema::dropIfExists('peserta');
    }
};
