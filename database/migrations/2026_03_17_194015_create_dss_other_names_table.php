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
        Schema::create('dss_other_names', function (Blueprint $table) {
            $table->id();
            $table->string('ident', 8);
            $table->foreign('ident')->references('ident')->on('dss_candidates')->onDelete('cascade');
            $table->string('name', 64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dss_other_names');
    }
};
