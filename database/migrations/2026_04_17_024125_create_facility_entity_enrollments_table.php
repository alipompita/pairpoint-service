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
        Schema::create('facility_entity_enrollments', function (Blueprint $table) {
            $table->string('tracked_entity_instance', 32);
            $table->string('program_code');
            $table->foreign('tracked_entity_instance')->references('tracked_entity_instance')->on('facility_entities')->onDelete('cascade');
            $table->foreign('program_code')->references('program_code')->on('facility_programs')->onDelete('cascade');
            $table->date('enrollment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_entity_enrollments');
    }
};
