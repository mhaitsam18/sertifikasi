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
        Schema::create('instruktur_acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')
                ->constrained('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('acara_id')
                ->constrained('acara')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruktur_acara');
    }
};
