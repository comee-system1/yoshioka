<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineMypagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_mypages', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->text('text')->nullable();
            $table->text('text2')->nullable();
            $table->string('type')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('define_mypages');
    }
}
