<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('name');
            $table->text('sub_title')->nullable();
            $table->text('note')->nullable();
            $table->string('address')->nullable();
            $table->integer('map_status')->default(0);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('main_image')->nullable();
            $table->string('open_key');
            $table->integer('display_status')->default(1);
            $table->integer('delete_status')->default(0);
            $table->string('language1')->nullable()->default('JP');
            $table->string('language2')->nullable()->default('EN');
            $table->integer('template')->default(0);
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
        Schema::dropIfExists('seminers');
    }
}
