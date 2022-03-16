<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateTimeTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_time_titles', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('title2')->nullable();
            $table->integer('template_code')->default(1);
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
        Schema::dropIfExists('template_time_titles');
    }
}
