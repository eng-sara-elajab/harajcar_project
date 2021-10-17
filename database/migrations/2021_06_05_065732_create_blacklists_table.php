<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone');
            $table->string('email');
            $table->string('country');
            $table->longText('profile_photo')->nullable();
            $table->longText('cover_photo')->nullable();
            $table->string('password');
            $table->json('followers')->nullable();
            $table->json('following')->nullable();
            $table->json('favourite')->nullable();
            $table->string('no_of_likes')->default(0);
            $table->string('no_of_dislikes')->default(0);
            $table->text('reports')->default(0);
            $table->text('active_status')->default('active');
            $table->boolean('documentation_status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('blacklists');
    }
}
