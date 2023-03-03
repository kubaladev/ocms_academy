<?php

namespace SamuelKubala\TimeEntryManagement\Classes;

use SamuelKubala\TimeEntryManagement\Models\TimeEntry;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use Illuminate\Support\Carbon;

class TimeTracking
{
    function isTaskTracked($task_id)
    {
        return app(TasksController::class)->isTaskTracked($task_id);
    }

    public function startTracking($task_id)
    {

        if ($this->isTaskTracked($task_id)) {
            return response(['error' => 'Task is being allready tracked', 'statusCode' => '400'], 400);
        }
        //$runningTask = $currentTask::find('endtime', null);
        //return $runningTask;
        $timeEntry = TimeEntry::make();
        $timeEntry->task_id = $task_id;
        $timeEntry->startitme = Carbon::now()->toDateTimeString();
        $timeEntry->save();
        return $timeEntry;
    }
    public function stopTracking($task_id)
    {
        $entry = $this->isTaskTracked($task_id);
        if (!$entry) {
            return response(['error' => 'Task is curently not tracked.', 'statusCode' => '400'], 400);
        }
        $entry->endtime = Carbon::now()->toDateTimeString();
        $entry->save();
        return $entry;
    }
}
