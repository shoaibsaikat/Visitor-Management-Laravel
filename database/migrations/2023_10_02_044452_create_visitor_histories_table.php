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
        Schema::create('visitor_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('visitor_id');
            $table->integer('officer_id');
            $table->integer('card_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_histories');
    }
};
