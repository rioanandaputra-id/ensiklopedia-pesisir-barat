<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationUserAccountsToGalleryAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->foreign('user_account_id')->references('id')->on('user_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->dropForeign('gallery_albums_user_account_id_foreign');
        });
    }
}
