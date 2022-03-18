<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationDocumentsToGalleryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('gallery_documents', function (Blueprint $table) {
        //     $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
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
        //     $table->dropForeign('gallery_documents_document_id_foreign');
        // });
    }
}
