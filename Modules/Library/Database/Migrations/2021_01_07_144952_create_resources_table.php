<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 256);
            $table->string('author', 128)->nullable();
            $table->string('year', 10)->nullable();
            $table->string('type', 128)->index();
            $table->char('language', 3);
            $table->string('level', 50)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(false);

            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);

            $table->foreignUuid('file_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('cover_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('category_id')->references('id')->on('categories');
            $table->foreignUuid('theme_id')->references('id')->on('themes');

            $table->timestamps();
            $table->userstamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
