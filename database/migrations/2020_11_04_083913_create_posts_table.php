<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('prefecture_id');
            $table->unsignedBigInteger('budget_id');
            $table->unsignedBigInteger('target_id');
            $table->json('flow_chart');
            $table->timestamps();

            $table->foreign('prefecture_id')->references('id')->on('prefectures');
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->foreign('target_id')->references('id')->on('targets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
