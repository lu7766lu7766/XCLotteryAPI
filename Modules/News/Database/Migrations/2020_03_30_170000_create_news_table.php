<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('classified_id')->comment('classified id');
            $table->string('title')->comment('標題');
            $table->string('description')->comment('新聞介紹');
            $table->string('source', 20)->comment('新聞來源');
            $table->string('picture_url')->comment('圖片連結');
            $table->enum('enable', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('狀態');
            $table->string('url')->comment('新聞連結');
            $table->dateTime('post_time')->comment('發佈時間');
            $table->softDeletes();
            //foreign key
            $table->foreign('classified_id')->references('id')->on('news_classified')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('news');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
