<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papi', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran');
            $table->text('jwb1')->nullable();
            $table->text('jwb2')->nullable();
            $table->text('jwb3')->nullable();
            $table->text('jwb4')->nullable();
            $table->text('jwb5')->nullable();
            $table->text('jwb6')->nullable();
            $table->text('jwb7')->nullable();
            $table->text('jwb8')->nullable();
            $table->text('jwb9')->nullable();
            $table->text('jwb10')->nullable();
            // Lanjutkan dengan jwb11 sampai jwb90
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
        Schema::dropIfExists('papi');
    }
}
