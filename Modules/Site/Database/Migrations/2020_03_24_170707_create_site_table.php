<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('網站名稱');
            $table->string('logo_path')->nullable()->comment('logo');
            $table->string('copyright')->nullable()->comment('版權所有');
            $table->string('icp', 30)->nullable()->comment('ICP備案號');
            $table->text('contact')->nullable()->comment('聯繫資訊');
            $table->string('ios_qr_path')->nullable()->comment('ios qr code');
            $table->string('android_qr_path')->nullable()->comment('android qr code');
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
        Schema::dropIfExists('site');
    }
}
