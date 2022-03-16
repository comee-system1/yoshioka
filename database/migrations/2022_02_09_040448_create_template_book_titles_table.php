<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateBookTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_book_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id')->default(0);
            $table->text('text')->nullable();
            $table->text('text2')->nullable();
            $table->string('template_code')->default(1);
            $table->string('type')->default(0);
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
        Schema::dropIfExists('template_book_titles');
    }
}
