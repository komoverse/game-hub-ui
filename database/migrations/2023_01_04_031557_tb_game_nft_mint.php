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
        Schema::create('tb_game_nft_mint', function (Blueprint $table) {
            $table->id();
            $table->string('game_id');
            $table->string('phase_name');
            $table->string('allowlist');
            $table->integer('supply');
            $table->float('mint_price');
            $table->string('mint_page_url')->nullable();
            $table->string('image_url')->nullable();
            $table->dateTime('mint_start_date')->nullable();
            $table->dateTime('mint_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_game_nft_mint');
    }
};
