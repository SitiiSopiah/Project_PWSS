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
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('wilayah_rt', 20);
            $table->integer('jumlah_karung')->default(0);
            $table->decimal('total_pemasukan', 15, 2)->default(0);
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatans');
    }
};
