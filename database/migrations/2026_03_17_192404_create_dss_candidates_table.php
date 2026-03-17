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
        Schema::create('dss_candidates', function (Blueprint $table) {
            $table->string('ident', 8)->primary();
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->date('dob')->nullable();
            $table->enum('site', ['1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dss_candidates');
    }
};
