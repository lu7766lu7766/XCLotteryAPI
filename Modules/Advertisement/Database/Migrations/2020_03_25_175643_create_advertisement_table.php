<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('標題');
            $table->string('image_path')->comment('圖片');
            $table->enum('is_blank', NYEnumConstants::enum())->default(NYEnumConstants::NO)->comment('是否另開視窗');
            $table->string('url')->nullable()->comment('連結');
            $table->enum('status', NYEnumConstants::enum())->comment('狀態');
            $table->unsignedInteger('type_id')->comment('類型ID');
            $table->timestamps();
            //foreign
            $table->foreign('type_id')->references('id')->on('advertisement_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('advertisement');
        Schema::enableForeignKeyConstraints();
    }
}
