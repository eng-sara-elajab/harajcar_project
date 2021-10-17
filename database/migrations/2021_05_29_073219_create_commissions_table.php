<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->text('username');
            $table->text('phone');
            $table->text('bank_name');
            $table->text('commission');
            $table->text('transformation_time');
            $table->text('transformer_name');
            $table->longText('notes')->nullable();
            $table->text('ads_no');
            $table->integer('user_id');
            $table->text('status')->default('unread');
            $table->longText('bill');
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
        Schema::dropIfExists('commissions');
    }
}
