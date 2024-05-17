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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tb_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->text('tags');
            $table->text('url');
            $table->text('short_url');
            $table->string('path');
            $table->string('real_path');
            $table->string('iklan')->nullable();
            $table->string('created_by');
            $table->string('edited_by');
            $table->timestamp('durations_start')->nullable();
            $table->timestamp('durations_end')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('is_active')->default(1);
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
