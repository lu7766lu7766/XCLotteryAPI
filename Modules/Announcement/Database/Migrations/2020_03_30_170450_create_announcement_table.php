<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('標題');
            $table->string('cover')->nullable()->comment('封面');
            $table->text('contents')->comment('內文');
            $table->enum('is_marquee', NYEnumConstants::enum())->comment('是否為跑馬燈');
            $table->enum('is_top', NYEnumConstants::enum())->comment('是否置頂');
            $table->enum('status', NYEnumConstants::enum())->comment('狀態');
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
        Schema::dropIfExists('announcement');
    }
}
