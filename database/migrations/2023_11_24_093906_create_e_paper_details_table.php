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
        Schema::create('e_paper_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('date');
            $table->string('place');
            $table->string('is_download');
            $table->string('is_premium');
            $table->string('status');
            $table->string('is_delete');
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
        Schema::dropIfExists('e_paper_details');
    }
};
