<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('task_name')->nullable();

            $table->string('category_name')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->string('priority')->nullable();
            $table->integer('status')->nullable();

            $table->softDeletes();

            $table->foreign('user_id')
            ->references('id')
            ->on('users');


            $table->foreign('categorie_id')
            ->references('id')
            ->on('categories');

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
        Schema::dropIfExists('tasks');
    }
}
