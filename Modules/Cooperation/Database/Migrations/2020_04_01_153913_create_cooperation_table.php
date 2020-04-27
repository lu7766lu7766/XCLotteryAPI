<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Base\Constants\NYEnumConstants;

class CreateCooperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 30)->comment('標題');
            $table->string('link')->nullable()->comment('連結');
            $table->string('image_path')->nullable()->comment('圖片路徑');
            $table->enum('enable', NYEnumConstants::enum())->comment('開啟狀態');
            $table->enum('is_blank', NYEnumConstants::enum())->default(NYEnumConstants::NO)->comment('另開新視窗');
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
        Schema::dropIfExists('cooperation');
    }
}
