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
        Schema::create('facility_entities', function (Blueprint $table) {
            $table->string('tracked_entity_instance', 32)->primary();
            $table->string('organisation_unit', 32);
            $table->foreign('organisation_unit')->references('code')->on('organisation_units')->onDelete('cascade');
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->string('phone_number', 32)->nullable();
            $table->string('place_of_residence__physical_address', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_entities');
    }
};
