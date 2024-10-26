<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default($this->getUuidDefault());
            $table->string('bot_name');
            $table->json('json');
            $table->longText('debug_trace');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function getUuidDefault(): ?\Illuminate\Contracts\Database\Query\Expression
    {
        return match (config('database.default')) {
            'mysql' => DB::raw('uuid()'),
            'pgsql' => DB::raw('gen_random_uuid()'),
            default => null,
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
