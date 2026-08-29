<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('no_hp', 20)->nullable();

            $table->string('wilayah_rt', 20);

            $table->string('status', 50);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};