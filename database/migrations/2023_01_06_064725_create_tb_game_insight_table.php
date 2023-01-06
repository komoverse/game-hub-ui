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
        Schema::create('tb_game_insight', function (Blueprint $table) {
            $table->string('game_id');
            $table->integer('discord_member');
            $table->integer('discord_active');
            $table->integer('telegram_member');
            $table->integer('telegram_active');
            $table->timestamps();
            $table->primary('game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_game_insight');
    }
};
