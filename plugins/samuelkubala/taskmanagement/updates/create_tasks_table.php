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
            $table->dateTime("plannedstart")->nullable();
            $table->dateTime("plannedend")->nullable();
            $table->integer("plannedduration")->nullable();
            $table->integer("owner_id")->index();
            $table->integer('project_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_taskmanagement_tasks');
    }
}
