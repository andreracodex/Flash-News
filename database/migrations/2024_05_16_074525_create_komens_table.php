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
        Schema::create('tb_komens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('comments');
            $table->string('is_active');
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')->references('id')->on('tb_beritas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('created_by');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_komens');
    }
};
