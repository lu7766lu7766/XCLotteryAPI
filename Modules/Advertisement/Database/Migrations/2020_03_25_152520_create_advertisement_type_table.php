<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateAdvertisementTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique()->comment('代碼');
            $table->string('name')->comment('類型名稱');
            $table->enum('status', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('狀態');
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
        Schema::dropIfExists('advertisement_type');
    }
}
