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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id(); 

            $table->string('service_type');
            
            // Foreign Keys
            $table->string('car_platenumber'); 
            $table->foreign('car_platenumber')->references('car_platenumber')->on('cars')->onDelete('cascade');

            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); 
            $table->foreignId('service_id')->constrained('service')->onDelete('cascade');

            $table->enum('status', ['pending', 'declined', 'complete'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
