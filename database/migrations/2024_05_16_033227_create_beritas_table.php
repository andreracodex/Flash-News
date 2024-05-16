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
        Schema::create('tb_beritas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('links');
            $table->string('is_active');
            $table->string('path');
            $table->string('real_path');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tb_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('iklan');
            $table->string('created_by');
            $table->string('edited_by');
            $table->timestamp('durations_start');
            $table->timestamp('durations_end');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_beritas');
    }
};
