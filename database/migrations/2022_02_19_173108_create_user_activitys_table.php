<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activitys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ip_address', 45)->nullable();
            $table->uuid('user_created');
            $table->string('activity');
            $table->timestamp('created_at')->useCurrent();
            $table->uuid('user_target');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activitys');
    }
}
