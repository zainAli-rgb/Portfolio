<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreignId('sticky_id')
                ->nullable()
                ->constrained('sticky_notes') // <-- specify your table name
                ->onDelete('cascade');

            $table->timestamp('scheduled_at')->nullable(); // when to notify
            $table->timestamp('read_at')->nullable();      // when user read
            $table->boolean('is_triggered')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
