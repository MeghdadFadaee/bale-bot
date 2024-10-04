<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_keyboard_buttons', function (Blueprint $table) {
            $table->id();

            $table->string('text');
            $table->boolean('request_contact')->default(false);
            $table->boolean('request_location')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_keyboard_buttons');
    }
};
