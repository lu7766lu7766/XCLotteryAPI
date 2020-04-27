<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryClassifiedLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_classified_lottery', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lottery_classified_id');
            $table->unsignedInteger('lottery_id');
            $table->timestamps();
            $table->foreign('lottery_classified_id')->references('id')->on('lottery_classified')->onDelete('cascade');
            $table->foreign('lottery_id')->references('id')->on('lottery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_classified_lottery');
    }
}
