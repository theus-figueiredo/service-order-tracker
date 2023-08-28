<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_costcenter', function (Blueprint $table) {
            $table->unasignedBigInteger('user_id');
            $table->unasignedBigInteger('cost_center_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cost_center_id')->references('id')->on('cost_center');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_costcenter');
    }
};
