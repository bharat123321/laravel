<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postviews', function (Blueprint $table) {
            $table->increments("id");
        $table->unsignedInteger("post_id");
        $table->string("url");
        $table->string("session_id");
        $table->unsignedInteger('user_id')->nullable();
        $table->string("ip");
        $table->string("agent");
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
        Schema::dropIfExists('postviews');
    }
}
