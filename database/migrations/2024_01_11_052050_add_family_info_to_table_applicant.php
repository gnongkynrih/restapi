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
            $table->string('father_occupation',40)->nullable();
            $table->string('mother_occupation',40)->nullable();
            $table->string('father_phone',10)->nullable();
            $table->string('mother_phone',10)->nullable();
            $table->string('corresponding_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('father_designation',20)->nullable();
            $table->string('mother_designation',20)->nullable();
            $table->string('guardian_name',50)->nullable();
            $table->string('guardian_address',200)->nullable();
            $table->string('guardian_phone',10)->nullable();
            $table->string('father_id',80)->nullable();
            $table->string('mother_id',80)->nullable();
            $table->integer('boys')->default(0);
            $table->integer('girls')->default(0);
            $table->integer('total_members')->default(1);
            $table->string('family_pic',80)->nullable();
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
