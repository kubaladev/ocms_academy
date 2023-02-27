<?php

namespace SamuelKubala\TaskManagement\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_taskmanagement_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->time("plannedstart");
            $table->time("plannedend");
            $table->time("plannedtime");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_taskmanagement_tasks');
    }
}
