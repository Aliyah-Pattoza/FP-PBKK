<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reschedules', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('booking_id')->constrained('bookings'); 
            $table->date('original_travel_date');
            $table->string('slug')->unique();
            $table->date('new_travel_date'); 
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reschedules');
    }
};
