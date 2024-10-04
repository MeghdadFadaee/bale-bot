<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_voices', function (Blueprint $table) {
            $table->id();

            $table->string('file_id')->primary();
            $table->string('file_unique_id');
            $table->integer('duration')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_voices');
    }
};
