<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateJoinTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_join_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text')->nullable()->comment('姓,名 等 複数の場合はカンマ区切り');
            $table->integer('template_code')->default(1);
            $table->integer('required')->default(0);
            $table->string('required_text')->nullable();
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
        Schema::dropIfExists('template_join_titles');
    }
}
