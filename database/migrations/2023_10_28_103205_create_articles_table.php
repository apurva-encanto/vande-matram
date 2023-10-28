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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title');
            $table->string('title_slug');
            $table->string('image');
            $table->string('category_id');
            $table->string('category_slug');
            $table->string('content');
            $table->string('publish_date');
            $table->string('views');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->enum('popular', ['0', '1'])->default('0');
            $table->enum('top_new', ['0', '1'])->default('0');
            $table->string('publish')->default('0');
            $table->string('is_show')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('is_delete', ['0', '1'])->default('0');
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
        Schema::dropIfExists('articles');
    }
};
