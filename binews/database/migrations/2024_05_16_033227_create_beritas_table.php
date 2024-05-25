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
            $table->text('title');
            $table->text('description');
            $table->text('source');
            $table->text('url');
            $table->text('image_url');
            $table->text('article_id');
            $table->text('creator')->nullable();
            $table->text('video_url')->nullable();
            $table->timestamp('pub_date')->nullable();
            $table->text('source_id')->nullable();
            $table->integer('source_priority')->default(0);
            $table->text('source_url')->nullable();
            $table->text('source_icon')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('tb_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->text('category')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('is_trending')->default(0);
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
