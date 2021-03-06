<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateMasterSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_master_spaces', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id')->default(0);
            $table->string('text');
            $table->string('text2')->nullable();;
            $table->string('template_code')->default(1);
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('template_master_spaces');
    }
}
