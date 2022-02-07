<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_account_id');
            $table->string('name', 150);
            $table->enum('album', ['image', 'video'])->default('image');
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
        Schema::dropIfExists('gallery_albums');
    }
}
