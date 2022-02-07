<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationUserAccountsToArticlePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_posts', function (Blueprint $table) {
            $table->foreign('user_account_id')
            ->references('id')
            ->on('user_accounts')
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
            $table->dropForeign('article_posts_user_account_id_foreign');
        });
    }
}
