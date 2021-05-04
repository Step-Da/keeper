<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Запуск миграции по созданию таблицы Todos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40)->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('status')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();      
        });
    }

    /**
     * Откат миграции по созданию таблицы Todos
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
