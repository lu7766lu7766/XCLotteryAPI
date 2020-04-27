<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Base\Constants\NYEnumConstants;

class CreateLotteryClassifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_classified', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->unique()->comment('名稱');
            $table->enum('enable', NYEnumConstants::enum())->default(NYEnumConstants::YES);
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
        Schema::dropIfExists('lottery_classified');
    }
}
