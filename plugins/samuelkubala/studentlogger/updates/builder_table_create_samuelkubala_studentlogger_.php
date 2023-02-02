<?php namespace SamuelKubala\Studentlogger\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamuelkubalaStudentlogger extends Migration
{
    public function up()
    {
        Schema::create('samuelkubala_studentlogger_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->time('arrival');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samuelkubala_studentlogger_');
    }
}
