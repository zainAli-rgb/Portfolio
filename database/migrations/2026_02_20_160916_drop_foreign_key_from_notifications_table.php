<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Drop foreign key (replace with your exact FK name if needed)
            $table->dropForeign(['user_id']);
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Optionally recreate foreign key (if needed)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
