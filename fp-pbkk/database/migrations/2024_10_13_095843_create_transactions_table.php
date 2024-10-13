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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id')->primary(); // Transaction ID
            $table->string('vehicle_id'); // Vehicle ID must be a string
            //$table->foreign('vehicle_id')->references('id')->on('vehicles'); // Ensure vehicle_id matches vehicles.id
            $table->string('user_id'); // Ensure user_id matches users.id
            //$table->foreign('user_id')->references('id')->on('users');
            $table->string('package_id'); // Ensure package_id matches packages.id
           // $table->foreign('package_id')->references('id')->on('packages');
            $table->date('transaction_date');
            $table->enum('status', ['Success', 'Canceled', 'Rescheduled', 'Refunded']);
            $table->decimal('total_price', 10, 2);
            $table->integer('person_number');
            $table->timestamps();
        });                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
