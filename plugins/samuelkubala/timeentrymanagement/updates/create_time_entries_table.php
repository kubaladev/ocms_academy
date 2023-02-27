<?php

namespace SamuelKubala\TimeEntryManagement\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_timeentrymanagement_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->time('startitme');
            $table->time('endtime');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuelkubala_timeentrymanagement_time_entries');
    }
}
