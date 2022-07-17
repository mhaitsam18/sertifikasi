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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->text('isi');
            $table->foreignId('penulis_id')->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->string('thumbnail');
            $table->integer('views')->default(0);
            $table->dateTime('publish_at')->nullable();
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
        Schema::dropIfExists('berita');
    }
};
