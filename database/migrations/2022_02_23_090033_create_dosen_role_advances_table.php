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
        Schema::create('dosen_role_advance', function (Blueprint $table) {
            // $table->timestamps();
            $table->foreignId('dosen_id')
                ->constrained('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('role_advance_id')
                ->constrained('role_advance')
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
        Schema::dropIfExists('dosen_role_advance');
    }
};
