<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorFilesUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor_files_used', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('editor_file_id')->comment('檔案id');
            $table->unsignedInteger('used_id')->comment('使用方id');
            $table->string('used_type')->comment('使用方');
            //foreign key
            $table->foreign('editor_file_id')->references('id')->on('editor_files')->onDelete('cascade');
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
        Schema::dropIfExists('editor_files_used');
        Schema::enableForeignKeyConstraints();
    }
}
