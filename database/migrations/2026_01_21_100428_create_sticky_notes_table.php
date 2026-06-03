<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sticky_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('content');

            $table->string('color', 20)->default('yellow');
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('reminder_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sticky_notes');
    }
};
