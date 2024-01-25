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
<<<<<<<< HEAD:database/migrations/2024_01_16_030916_create_students_table.php
        Schema::create('students', function (Blueprint $table) {
            $table->id();
========
        Schema::create('uids', function (Blueprint $table) {
            $table->string('uid', 11)->nullable();
            $table->unsignedBigInteger('id_siswa')->nullable();
>>>>>>>> ee7d5eb3826f3eba98e6123221687171bc8cc58c:database/migrations/2024_01_17_084354_create_uids_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2024_01_16_030916_create_students_table.php
        Schema::dropIfExists('students');
========
        Schema::dropIfExists('uids');
>>>>>>>> ee7d5eb3826f3eba98e6123221687171bc8cc58c:database/migrations/2024_01_17_084354_create_uids_table.php
    }
};
