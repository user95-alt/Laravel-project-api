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
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Must have a registered user
            $table->date('reservation_date');   // When the booking was made
            $table->date('check_in_date');     // Start date
            $table->date('check_out_date');   // End date

          //status field
          $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->default('pending');
          $table->enum('reservation_status', ['pending', 'confirmed', 'cancelled'])->default('pending');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
