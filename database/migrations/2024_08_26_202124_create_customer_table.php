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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('usia');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->text('pekerjaan')->nullable();
            $table->string('nik')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('foto_sim')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('hak_akses')->default('2');
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
        Schema::dropIfExists('customer');
    }
};
