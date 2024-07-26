<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('nisn', 20)->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 1);
            $table->text('alamat')->nullable();
            $table->string('nomor_hp', 15)->nullable();
            $table->string('nama_orang_tua', 50)->nullable();
            $table->string('nomor_hp_orang_tua', 15)->nullable();
            $table->unsignedBigInteger('admin_id');

            $table->foreign('admin_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
