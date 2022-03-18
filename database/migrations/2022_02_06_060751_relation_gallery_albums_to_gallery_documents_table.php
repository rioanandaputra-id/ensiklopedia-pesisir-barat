<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationGalleryAlbumsToGalleryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('gallery_documents', function (Blueprint $table) {
        //     $table->foreign('gallery_album_id')->references('id')->on('gallery_albums')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('gallery_documents', function (Blueprint $table) {
        //     $table->dropForeign('gallery_documents_gallery_album_id_foreign');
        // });
    }
}
