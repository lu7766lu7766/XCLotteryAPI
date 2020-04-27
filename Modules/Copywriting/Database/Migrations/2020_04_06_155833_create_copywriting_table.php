<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Base\Constants\NYEnumConstants;

class CreateCopywritingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copywriting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('標題');
            $table->string('code', 20)->unique()->comment('代碼');
            $table->text('content')->nullable()->comment('內容');
            $table->enum('enable', NYEnumConstants::enum())->comment('狀態');
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
        Schema::dropIfExists('copywriting');
    }
}
