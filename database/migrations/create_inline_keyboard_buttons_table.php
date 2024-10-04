<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_inline_keyboard_buttons', function (Blueprint $table) {
            $table->id();

            $table->string('text');
            $table->string('url')->nullable();
            $table->string('callback_data')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_inline_keyboard_buttons');
    }
};
