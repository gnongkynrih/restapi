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
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('address_proof',80)->nullable();
            $table->string('birth_certificate',80)->nullable();
            $table->string('caste_certificate',80)->nullable();
            $table->string('baptism_certificate',80)->nullable();
            $table->string('language',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            //
        });
    }
};
