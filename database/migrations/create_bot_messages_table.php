<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_messages', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('update_id')->unsigned();
            $table->bigInteger('message_id')->unsigned();
            $table->bigInteger('chat_id')->unsigned();
            $table->bigInteger('from_id')->unsigned();

            $table->string('bot_name');
            $table->integer('date')->unsigned()->default(0);
            $table->longText('text')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_messages');
    }
};
