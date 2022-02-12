<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineSpaceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_space_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->integer('master_id')->default(0);
            $table->string('text');
            $table->integer('join_fee')->default(0);
            $table->integer('party_fee')->default(0);
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
        Schema::dropIfExists('define_space_lists');
    }
}
