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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->string('middle_name',30)->nullable();
            $table->string('mobile',10)->nullable();
            $table->string('email',70)->nullable();
            $table->string('father_name',60)->nullable();
            $table->string('mother_name',60)->nullable();
            $table->string('category',3)->nullable();
            $table->string('gender','6')->nullable();
            $table->string('class_name',10)->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('state',30)->nullable();
            $table->string('passport',80)->nullable();
            $table->string('nationality',10)->nullable();
            $table->string('community',25)->nullable();
            $table->foreignId('religion_id')->constrained('religions');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
