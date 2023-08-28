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
        Schema::create('service_order', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->text('description');
            $table->float('execution_value', 10, 2);
            $table->float('charging_value', 10, 2);
            $table->unsignedBigInteger('service_status_id');
            $table->unsignedBigInteger('service_category_id');
            $table->unsignedBigInteger('service_priority_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');
            $table->timestamps();

            $table->foreign('service_status_id')->references('id')->on('service_status');
            $table->foreign('service_category_id')->references('id')->on('service_category');
            $table->foreign('service_priority_id')->references('id')->on('service_priority');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_order');
    }
};
