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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('approver1_id')->nullable()->default(null);
            $table->unsignedBigInteger('approver2_id')->nullable()->default(null);
            $table->time('from');
            $table->time('to');
            $table->string('description');
            $table->foreign('approver1_id')->references('id')->on('people');
            $table->foreign('approver2_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave');
    }
};
