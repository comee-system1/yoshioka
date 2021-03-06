<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateEndaiTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_endai_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->string('text')->nullable();
            $table->string('text2')->nullable();
            $table->integer('template_code')->default(1);
            $table->integer('required')->default(0);
            $table->string('required_text')->nullable();
            $table->string('required_text2')->nullable();
            $table->string('error_message')->nullable();
            $table->string('error_message2')->nullable();
            $table->integer('sort')->default(0);
            $table->string('type')->default('input')->comment('title/input/button');
            $table->integer('display_status')->default(1);
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
        Schema::dropIfExists('template_endai_titles');
    }
}
