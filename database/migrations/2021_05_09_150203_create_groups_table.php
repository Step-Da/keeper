<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Запуск миграции по созданию таблицы Groups
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 25)->unique();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('tasks_id')->nullable();
            $table->foreign('tasks_id')->references('id')->on('tasks');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции по созданию таблицы Groups
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
