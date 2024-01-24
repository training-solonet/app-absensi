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
        Schema::connection('mysql2')->create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->string('nim')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->char('place_birth', 50)->nullable();
            $table->date('date_birth')->nullable();
            $table->string('telp', 26)->nullable();
            $table->char('email', 50)->nullable();
            $table->text('address')->nullable();
            $table->enum('religion', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Konghucu'])->nullable();
            $table->string('majors_id', 3);
            $table->string('school_id', 3);
            $table->char('img', 200)->default('default.jpg');
            $table->date('date_in');
            $table->date('date_out');
            $table->text('notes')->nullable();
            $table->text('uid')->nullable();
            $table->timestamps();
            $table->char('img_surat', 200)->default('default.jpg');
            $table->char('img_kuitansi', 200)->default('default.jpg');
            $table->char('img_keterangansehat', 200)->nullable();
            $table->enum('penilaian', ['Cumlaude', 'Sangat-Memuaskan', 'Memuaskan', 'Cukup', 'Kurang'])->nullable();
            $table->enum('status', ['Aktif', 'Tidak'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
