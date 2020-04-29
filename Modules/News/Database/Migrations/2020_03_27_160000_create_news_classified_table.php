<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateNewsClassifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_classified', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name', 20)->comment('名稱');
            $table->enum('enable', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('啟用');
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
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('news_classified');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
