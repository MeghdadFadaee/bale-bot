<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bot_successful_payments', function (Blueprint $table) {
            $table->id();

            $table->string('currency');
            $table->integer('total_amount');
            $table->string('invoice_payload');
            $table->string('shipping_option_id')->nullable();
            $table->json('order_info')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_successful_payments');
    }
};
