<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiu', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pendaftaran');
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
            $table->text('jwb11')->nullable();
            $table->text('jwb12')->nullable();
            $table->text('jwb13')->nullable();
            $table->text('jwb14')->nullable();
            $table->text('jwb15')->nullable();
            $table->text('jwb16')->nullable();
            $table->text('jwb17')->nullable();
            $table->text('jwb18')->nullable();
            $table->text('jwb19')->nullable();
            $table->text('jwb20')->nullable();
            $table->text('jwb21')->nullable();
            $table->text('jwb22')->nullable();
            $table->text('jwb23')->nullable();
            $table->text('jwb24')->nullable();
            $table->text('jwb25')->nullable();
            $table->text('jwb26')->nullable();
            $table->text('jwb27')->nullable();
            $table->text('jwb28')->nullable();
            $table->text('jwb29')->nullable();
            $table->text('jwb30')->nullable();
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
        Schema::dropIfExists('tiu');
    }
}
