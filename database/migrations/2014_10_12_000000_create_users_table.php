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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->enum('agama', ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Budha', 'Hindu', 'Konghucu', 'Yahudi']);
            $table->string('tentang');
            $table->string('foto');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->foreignId('role_id');
            $table->foreignId('role_id')->nullable()
                ->constrained('role')
                ->onUpdate('cascade')
                // ->onDelete('cascade');
                ->nullOnDelete();
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
