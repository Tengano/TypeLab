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
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['user_id']);
            // Modify to nullable
            $table->foreignId('user_id')->nullable()->change();
            // Re-add foreign key with nullOnDelete instead of cascadeOnDelete
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the modified foreign key
            $table->dropForeign(['user_id']);
            // Revert to not nullable
            $table->foreignId('user_id')->change();
            // Re-add original cascadeOnDelete
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
};