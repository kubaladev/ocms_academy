<?php

namespace SamuelKubala\TaskManagement\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Illuminate\Support\Carbon;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_taskmanagement_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->time("plannedstart")->nullable();
            $table->time("plannedend")->nullable();
            $table->time("plannedtime")->nullable();
            //Takto mi to ide spravit
            $table->integer('project_id')->index();
            //Takto som to robil v laraveli predtym
            //$table->foreign('project_id')->references('id')->on('samuelkubala_project_projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_taskmanagement_tasks');
    }
}
