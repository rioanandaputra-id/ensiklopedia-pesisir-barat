<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationArticleDocumentsToArticlePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_posts', function (Blueprint $table) {
            $table->foreign('document_id')
                ->references('id')
                ->on('article_documents')
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
        Schema::table('article_posts', function (Blueprint $table) {
            $table->dropForeign('article_posts_document_id_foreign');
        });
    }
}
