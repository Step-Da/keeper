<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Запуск миграции по созданию таблицы Tasks
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 25)->unique();
            $table->string('description', 25)->default('Описание задачи нет.');
            $table->string('type');
            $table->boolean('status')->default(false);
            $table->timestamp('endpoint');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('users');
        });
    }

    /**
     * Откат миграции по созданию таблицы Tasks
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
