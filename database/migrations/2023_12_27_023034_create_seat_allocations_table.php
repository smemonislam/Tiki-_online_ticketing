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
        Schema::create('seat_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bus_id')->constrained('buses')->onDelete('cascade');
            $table->string('seat_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seat_allocations', function (Blueprint $table) {
            $table->dropForeign(['trip_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['bus_id']);
            $table->dropIfExists();
        });
    }
};
