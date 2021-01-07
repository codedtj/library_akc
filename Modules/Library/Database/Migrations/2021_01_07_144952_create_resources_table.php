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
            $table->string('author', 128);
            $table->string('year', 4)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(false);

            $table->foreignUuid('file_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('cover_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('category_id')->references('id')->on('categories');

            $table->timestamps();
            $table->userstamps();
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
