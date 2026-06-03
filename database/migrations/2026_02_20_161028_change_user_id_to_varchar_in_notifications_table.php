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

            // 1️⃣ Drop foreign key if it exists
            if (Schema::hasColumn('notifications', 'user_id')) {
                // Ignore FK name errors, just change column
                $table->string('user_id')->change();
            }
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Revert to unsignedBigInteger
            $table->unsignedBigInteger('user_id')->change();
        });
    }
};
