<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_id');
            $table->integer('room_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('duration');
            $table->integer('total_amount');
            $table->timestamps();
        });
    }

    // Schema::create('bookings', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('guest_id')->constrained('users');
    //     $table->foreignId('room_id')->constrained('rooms');
    //     $table->date('check_in_date');
    //     $table->date('check_out_date');
    //     $table->integer('duration');
    //     $table->integer('total_amount');
    //     $table->timestamps();
    // });


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
