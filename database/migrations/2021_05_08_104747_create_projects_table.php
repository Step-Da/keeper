<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Запуск миграции по созданию таблицы Projects
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 35)->unique();
            $table->string('description', 100)->default('Описание нет');
            $table->string('path', 35);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('remove')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Откат миграции по созданию таблицы Projects
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
