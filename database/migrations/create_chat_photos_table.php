<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_chat_photos', function (Blueprint $table) {
            $table->id();

            $table->string('small_file_id');
            $table->string('small_file_unique_id');
            $table->string('big_file_id');
            $table->string('big_file_unique_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_chat_photos');
    }
};
