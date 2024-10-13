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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_kendaraan');
            $table->string('brand');
            $table->integer('capacity');
            $table->string('model');
            $table->string('plate');
            $table->decimal('rental_rate', 10, 2);
            $table->enum('status', ['tersedia', 'disewa', 'dalam perbaikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
