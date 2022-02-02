<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('article_post_id');
            $table->string('name', 255);
            $table->text('path');
            $table->enum('type', ['image', 'video', 'audio', 'document']);
            $table->boolean('uploded')->nullable()->default(true);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_documents');
    }
}
