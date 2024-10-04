<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_contacts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');
            $table->string('phone_number');
            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_contacts');
    }
};
