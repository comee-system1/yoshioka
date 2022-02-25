<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateMasterPasswordRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_master_password_renews', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id')->default(1);
            $table->text('title')->nullable();
            $table->text('text')->nullable();
            $table->integer('template_code')->default(1);
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
        Schema::dropIfExists('template_master_password_renews');
    }
}
