<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiasecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riasec', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran');
            $table->text('jawab1')->nullable();
            $table->text('jawab2')->nullable();
            $table->text('jawab3')->nullable();
            $table->text('jawab4')->nullable();
            $table->text('jawab5')->nullable();
            $table->text('jawab6')->nullable();
            $table->text('jawab7')->nullable();
            $table->text('jawab8')->nullable();
            $table->text('jawab9')->nullable();
            $table->text('jawab10')->nullable();
            // Lanjutkan dengan jawab11 sampai jawab42
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
        Schema::dropIfExists('riasec');
    }
}
