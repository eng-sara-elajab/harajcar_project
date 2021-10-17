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
            $table->string('type');
            $table->string('title');
            $table->string('status');
            $table->string('phone');
            $table->string('price')->nullable();
            $table->string('body');
            $table->string('region');
            $table->string('user_id');
            $table->string('ads_no')->default(random_int(100, 100000))->unique();
            $table->text('commission')->default('not_payed');
            $table->text('reports')->nullable();
            $table->text('active_status')->default('active');
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
        Schema::dropIfExists('posts');
    }
}
