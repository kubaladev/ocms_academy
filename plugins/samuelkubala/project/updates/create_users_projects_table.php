<?php

namespace SamuelKubala\Project\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateUsersProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_project_users_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->index();
            $table->integer('project_id')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_project_users_projects');
    }
}
