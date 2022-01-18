<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('account_type');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name_kana')->nullable();
            $table->string('last_name_kana')->nullable();
            $table->string('company')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->default(1);
            $table->string('password');
            $table->string('open_id')->comment("公開urlのユニークキーを所持するテーブルのID");
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
}
