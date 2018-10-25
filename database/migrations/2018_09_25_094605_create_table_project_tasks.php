<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('creater_id');
            $table->integer('receiver_id');
            $table->string('title');
            // bug,feature
            $table->string('type')->default('feature');
            // new,in_progress,resolved,closed
            $table->string('status')->default('new');
            // low,normal,high
            $table->string('priority')->default('normal');
            $table->text('details')->nullable();
            $table->float('working_hours')->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
