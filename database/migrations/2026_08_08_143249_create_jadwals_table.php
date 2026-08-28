<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_petugas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('jadwal_id')
                ->constrained('jadwals')
                ->cascadeOnDelete();

            $table->foreignId('petugas_id')
                ->constrained('petugas')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'jadwal_id',
                'petugas_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};