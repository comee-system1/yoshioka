<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable_programes', function (Blueprint $table) {
            $table->id();
            $table->integer('timetable_id')->default(0);
            $table->integer('seminer_id')->default(0);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('account_id')->nullable()->comment('講演者 / 参加者ID');
            $table->string('account_name')->nullable()->comment('講演者表示名');
            $table->integer('endai_id')->nullable()->comment('演題ID');
            $table->text('endai_name')->nullable()->comment('演題表示名');
            $table->integer('enabled')->default(0);
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
        Schema::dropIfExists('timetable_programes');
    }
}
