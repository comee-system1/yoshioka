<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineTimeTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_time_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->text('title');
            $table->integer('display_status')->default(1);
            $table->string('type')->default('input')->comment('title/input/button');
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
        Schema::dropIfExists('define_time_titles');
    }
}
