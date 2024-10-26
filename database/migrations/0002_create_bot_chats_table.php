<?php

use App\Enums\BotChatType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_chats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('chat_id')->unsigned();
            $table->enum('type', BotChatType::options());
            $table->string('title')->nullable();
            $table->json('photo')->nullable();
            $table->string('username');
            $table->string('first_name');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_chats');
    }
};
