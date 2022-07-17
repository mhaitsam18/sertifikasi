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
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->nullable()
                ->constrained('peserta')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            // $table->double('nilai');
            $table->string('nama');
            $table->string('sertifikat');
            $table->string('keterangan');
            $table->boolean('is_take')->default(false);
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
        Schema::dropIfExists('sertifikat');
    }
};
