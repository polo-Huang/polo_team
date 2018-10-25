<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReopenedAndStartDateToProjectTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_tasks', function (Blueprint $table) {
            $table->boolean('reopened')->default(0);
            $table->datetime('start_date')->nullable();
        });
        $projectTasks = DB::table('project_tasks');
        if ($projectTasks->count() > 0) {
            foreach ($projectTasks->get() as $key => $projectTask) {
                if ($projectTask->start_date == NULL) {
                    DB::table('project_tasks')->where('id', $projectTask->id)->update(['start_date' => $projectTask->created_at]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_tasks', function (Blueprint $table) {
            $table->dropColumn('reopened', 'start_date');
        });
    }
}
