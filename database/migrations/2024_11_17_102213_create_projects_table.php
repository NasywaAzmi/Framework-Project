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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama_projek');
            $table->text('deskripsi_projek');
            $table->text('tujuan_projek');
            $table->date('tanggal_dimulai');
            $table->date('tanggal_selesai');
            $table->text('hasil_projek');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
