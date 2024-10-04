<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_invoices', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');
            $table->string('payload');
            $table->string('provider_token');
            $table->string('start_parameter');
            $table->string('currency');
            $table->integer('total_amount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_invoices');
    }
};
