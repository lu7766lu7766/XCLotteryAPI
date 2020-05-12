<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/4
 * Time: 上午 10:25
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLotteryTableStep1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lottery', function (Blueprint $table) {
            $table->text('rule')->after('enable')->comment('規則');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lottery', function (Blueprint $table) {
            $table->dropColumn('rule');
        });
    }
}
