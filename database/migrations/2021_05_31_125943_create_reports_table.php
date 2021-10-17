<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->longText('serial_no');
            $table->text('plate_info_in_arabic');
            $table->text('plate_info_in_english');
            $table->text('phone_no')->nullable();
            $table->longText('ads_no')->nullable();
            $table->longText('report_file_name')->nullable();
            $table->integer('user_id');
            $table->text('status')->default('unread');
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
        Schema::dropIfExists('reports');
    }
}
