<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_messages', function (Blueprint $table) {
            $table->id();
            $table->string('bot_name');

            $table->foreignId('from_id')->constrained('bot_users')->cascadeOnDelete();
            $table->foreignId('chat_id')->constrained('bot_chats')->cascadeOnDelete();

            $table->foreignId('forward_from_id')->nullable()->constrained('bot_users')->nullOnDelete();
            $table->foreignId('forward_from_chat_id')->nullable()->constrained('bot_chats')->nullOnDelete();
            $table->foreignId('forward_from_message_id')->nullable()->constrained('bot_messages')->nullOnDelete();

            $table->foreignId('reply_to_message_id')->nullable()->constrained('bot_messages')->nullOnDelete();

            $table->foreignId('animation_id')->nullable()->constrained('bot_animations')->nullOnDelete();
            $table->foreignId('audio_id')->nullable()->constrained('bot_audios')->nullOnDelete();
            $table->foreignId('document_id')->nullable()->constrained('bot_documents')->nullOnDelete();
//            $table->foreignId('sticker_id')->nullable()->constrained('bot_stickers')->nullOnDelete();

            $table->bigInteger('update_id')->unsigned();
            $table->bigInteger('message_id')->unsigned();

            $table->integer('date')->unsigned()->default(0);
            $table->integer('forward_date')->unsigned()->default(0);
            $table->integer('edite_date')->unsigned()->default(0);

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
