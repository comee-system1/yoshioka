<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineEndaiTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_endai_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->string('title');
            $table->string('title2')->nullable();
            $table->string('text')->nullable();
            $table->string('text2')->nullable();
            $table->integer('required')->default(0);
            $table->string('required_text')->nullable();
            $table->string('required_text2')->nullable();
            $table->string('error_message')->nullable();
            $table->string('error_message2')->nullable();
            $table->integer('display_status')->default(1);
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('define_endai_titles');
    }
}
