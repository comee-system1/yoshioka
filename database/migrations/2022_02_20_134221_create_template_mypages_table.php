<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateMypagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_mypages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->text('text')->nullable();
            $table->text('text2')->nullable();
            $table->integer('template_code')->default(1);
            $table->string('type')->default(0);
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
        Schema::dropIfExists('template_mypages');
    }
}
