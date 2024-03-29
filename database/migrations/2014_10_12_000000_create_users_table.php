<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'agent', 'manager', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('is_delete', ['0', '1'])->default('0');
            $table->string('is_assign')->default('0');
            $table->string('device_token');
            $table->string('created_by')->nullable();
            $table->string('is_approved')->nullable();
            $table->string('image')->nullable();
            $table->integer('otp')->nullable();
            $table->integer('notify')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
