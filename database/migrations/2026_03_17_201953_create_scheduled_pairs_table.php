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
        Schema::create('scheduled_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_schedule_id')->constrained('review_schedules')->onDelete('cascade');
            $table->foreignId('matched_pair_id')->constrained('matched_pairs')->onDelete('cascade');
            $table->integer('reviews_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_pairs');
    }
};
