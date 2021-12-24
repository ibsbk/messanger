<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->foreignId('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreignId('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreignId('dialog_id');
            $table->foreign('dialog_id')->references('id')->on('dialogs');
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
        Schema::dropIfExists('messages');
    }
}
