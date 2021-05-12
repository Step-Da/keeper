<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanbansTable extends Migration
{
    /**
     * Запуск миграции по созданию таблицы Kanbans
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('task_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции по созданию таблицы Kanbans
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanbans');
    }
}
