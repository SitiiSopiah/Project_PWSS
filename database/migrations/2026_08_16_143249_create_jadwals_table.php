<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel jadwals
        Schema::create('jadwals', function (Blueprint $table) {

            $table->id();

            $table->date('tanggal');

            $table->string('wilayah_rt', 20);

            $table->timestamps();
        });


        // Tabel relasi jadwal dengan petugas
        Schema::create('jadwal_petugas', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('jadwal_id');

            $table->unsignedBigInteger('petugas_id');

            $table->timestamps();


            // Relasi ke jadwals
            $table->foreign('jadwal_id')
                ->references('id')
                ->on('jadwals')
                ->onDelete('cascade');


            // Relasi ke petugas
            $table->foreign('petugas_id')
                ->references('id')
                ->on('petugas')
                ->onDelete('cascade');


            // Supaya petugas yang sama tidak
            // dimasukkan dua kali dalam satu jadwal
            $table->unique([
                'jadwal_id',
                'petugas_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_petugas');

        Schema::dropIfExists('jadwals');
    }
};