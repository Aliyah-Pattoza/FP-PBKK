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
        Schema::create('reschedules', function (Blueprint $table) {
            $table->string('id_reschedule')->primary(); // Custom reschedule ID
            $table->date('original_travel_date'); // Original travel date
            $table->date('new_travel_date'); // New travel date
            $table->string('reason'); // Reason for rescheduling
            
            // Foreign key to 'id' column in 'transactions' table
            $table->string('transaction_id'); // Should match 'id' in 'transactions' table
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');

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
