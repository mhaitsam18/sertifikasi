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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->nullable()
                ->constrained('peserta')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->foreignId('rekening_tujuan_id')->nullable()
                ->constrained('rekening')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();

            $table->string('rekening_pengirim');
            $table->string('bank_pengirim');
            $table->string('nama_pengirim');
            $table->dateTime('waktu_transfer');
            $table->float('nominal_transfer', 16, 2);
            $table->string('bukti');
            $table->string('catatan');
            $table->string('keterangan');
            $table->integer('is_valid')->default(0);
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
        Schema::dropIfExists('pembayaran');
    }
};
