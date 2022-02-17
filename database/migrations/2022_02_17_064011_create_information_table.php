<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->string('title',512)->nullable();
            $table->text('note')->nullable();
            $table->string('link',512)->nullable();
            $table->string('file')->nullable();
            $table->string('display_type')->default('note')->comment('note,link,file');
            $table->string('type')->default('web')->comment('web,mail');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->integer('status')->default(1);
            $table->integer('send_flag')->default(0);
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
        Schema::dropIfExists('informations');
    }
}
