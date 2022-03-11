<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endais', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->integer('account_id')->default(0);
            $table->text('name');
            $table->text('note')->nullable();
            $table->integer('type')->default(0);
            $table->string('file1')->nullable();
            $table->string('file1_name')->nullable();
            $table->string('file2')->nullable();
            $table->string('file2_name')->nullable();
            $table->string('file3')->nullable();
            $table->string('file3_name')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('endais');
    }
}
