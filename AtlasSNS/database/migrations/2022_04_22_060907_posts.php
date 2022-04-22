<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');
            $table->string('post', 255);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

        });
    }
}
