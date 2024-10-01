<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bot_chats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('chat_id')->unsigned();
            $table->string('type');
            $table->json('photo')->nullable();
            $table->string('username');
            $table->string('first_name');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_chats');
    }
};
