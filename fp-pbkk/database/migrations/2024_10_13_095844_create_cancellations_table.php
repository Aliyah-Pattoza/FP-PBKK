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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->string('id_cancelled')->primary(); // Custom cancellation ID
            $table->string('reason'); // Reason for cancellation
            $table->string('transaction_id'); // Foreign key to transactions table

            $table->timestamps();

            // Set foreign key constraint on transaction_id, referencing id in transactions table
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellations');
    }
};
