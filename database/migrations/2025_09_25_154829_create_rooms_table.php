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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_no');
            $table->string('room_type');
            $table->integer('capacity');
            $table->integer('price',); //whole number fee
            $table->boolean('availability')->default(true);
            $table->text('amenities')->nullable();
            $table->string('file_upload')->nullable(); //room images
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
