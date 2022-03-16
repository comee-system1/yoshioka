<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateInvoiceTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_invoice_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->string('template_code')->default(1);
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
        Schema::dropIfExists('template_invoice_titles');
    }
}
