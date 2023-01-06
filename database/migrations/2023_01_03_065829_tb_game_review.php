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
        Schema::create('tb_game_review', function (Blueprint $table) {
            $table->id();
            $table->string('komo_username');
            $table->string('game_id');
            $table->float('rating');
            $table->string('comment')->nullable();
            $table->string('review_picture_url')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_game_review');
    }
};
