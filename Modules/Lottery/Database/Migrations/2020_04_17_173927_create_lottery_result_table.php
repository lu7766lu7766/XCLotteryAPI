<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Base\Constants\NYEnumConstants;

class CreateLotteryResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('lottery_id')->comment('彩種id');
            $table->string('period', '20')->comment('期數號碼');
            $table->timestamp('draw_time')->nullable()->comment('開獎時間');
            $table->timestamp('open_time')->nullable()->comment('開盤時間');
            $table->timestamp('close_time')->nullable()->comment('關盤時間');
            $table->string('winning_numbers', 100)->nullable()->comment('中獎號碼');
            $table->enum('enable', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('狀態');
            $table->timestamps();
            $table->foreign('lottery_id')->references('id')->on('lottery')->onDelete('cascade');
            $table->unique(['lottery_id', 'period']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_result');
    }
}
