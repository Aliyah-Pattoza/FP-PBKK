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
        Schema::create('refunds', function (Blueprint $table) {
            $table->string('id_refund')->primary(); // Custom refund ID
            $table->decimal('refund_amount', 10, 2); // Refund amount
            $table->string('reason'); // Reason for refund
            $table->string('transaction_id'); // Foreign key to transactions table

            $table->timestamps();

            // Foreign key constraint on transaction_id, referencing id in transactions table
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
