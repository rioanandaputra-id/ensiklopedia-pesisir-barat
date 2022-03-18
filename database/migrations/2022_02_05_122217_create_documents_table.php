<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('documents', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->string('title', 255);
        //     $table->string('path', 255);
        //     $table->enum('type', ['image', 'video', 'audio', 'other'])->default('other');
        //     $table->boolean('uploaded')->default(false);
        //     // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('documents');
    }
}
