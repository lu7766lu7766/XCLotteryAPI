<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Base\Constants\NYEnumConstants;

class CreateLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique()->comment('名稱');
            $table->string('code', 10)->unique()->comment('代碼');
            $table->enum('enable', NYEnumConstants::enum())
                ->default(NYEnumConstants::YES)
                ->comment('開啟');
            $table->string('image_path')->nullable()->comment('圖片路徑');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery');
    }
}
