<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_photo_sizes', function (Blueprint $table) {
            $table->id();

            $table->string('file_id');
            $table->string('file_unique_id');
            $table->integer('width');
            $table->integer('height');
            $table->integer('file_size')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_photo_sizes');
    }
};
