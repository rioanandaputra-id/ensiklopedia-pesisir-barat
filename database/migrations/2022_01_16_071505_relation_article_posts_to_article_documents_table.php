<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationArticlePostsToArticleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_documents', function (Blueprint $table) {
            $table->foreign('article_post_id')
                ->references('id')
                ->on('article_posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_documents', function (Blueprint $table) {
            $table->dropForeign('article_posts_article_post_id_foreign');
        });
    }
}
