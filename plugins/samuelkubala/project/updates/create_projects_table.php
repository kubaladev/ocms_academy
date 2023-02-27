<?php

namespace SamuelKubala\Project\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->string('customer');
            $table->string('owner');
            $table->string('projectmanager');
            $table->boolean('isclosed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_project_projects');
    }
}
