<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('article_category_id');
            $table->foreignUuid('article_index_id');
            $table->foreignUuid('user_id');
            $table->char('slug', 255)->unique();
            $table->string('title', 255);
            $table->text('content')->nullable(true);
            $table->bigInteger('views');
            $table->enum('status', ['Tunggu', 'Terbit', 'Arsip']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_posts');
    }
}
