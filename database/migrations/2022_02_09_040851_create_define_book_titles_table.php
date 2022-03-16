<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineBookTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_book_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id')->default(0);
            $table->integer('seminer_id')->default(0);
            $table->text('text');
            $table->text('text2')->nullable();
            $table->integer('display_status')->default(1);
            $table->string('type')->default('input')->comment('title/explain');
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
        Schema::dropIfExists('define_book_titles');
    }
}
