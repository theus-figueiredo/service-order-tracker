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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            //$table->unsignedBigInteger('cost_center_id')->nullable();
            $table->string('phone_number');
            $table->string('cpf');
            $table->rememberToken();
            $table->timestamps();

            //$table->foreign('role_id')->references('id')->on('roles');
            //$table->foreign('cost_center_id')->references('id')->on('cost_center');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
