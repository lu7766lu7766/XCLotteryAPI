<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/5
 * Time: 下午 01:25
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLotteryTableStep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lottery', function (Blueprint $table) {
            $table->string('description')->nullable()->after('enable')->comment('描述');
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
            $table->dropColumn('description');
        });
    }
}
