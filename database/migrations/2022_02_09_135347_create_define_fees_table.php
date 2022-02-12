<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefineFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('define_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('seminer_id')->default(0);
            $table->integer('join_status')->default(0);
            $table->integer('party_status')->default(0);
            $table->integer('stripe_status')->default(0);
            $table->string('stripekey_public',255)->nullable();
            $table->string('stripekey_secret',255)->nullable();
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
        Schema::dropIfExists('define_fees');
    }
}
