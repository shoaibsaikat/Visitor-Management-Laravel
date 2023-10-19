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
        Schema::table('users', function($table)
        {
            $table->unsignedBigInteger('officer_id')->nullable()->default(null);
            $table->foreign('officer_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'officer_id'))
        {
            Schema::table('users', function (Blueprint $table)
            {
                $table->dropColumn('officer_id');
            });
        }
    }
};
