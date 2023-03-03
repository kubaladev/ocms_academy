<?php

namespace SamuelKubala\TimeEntryManagement\Http\Controllers;

use Illuminate\Routing\Controller;
use SamuelKubala\TimeEntryManagement\Models\TimeEntry;
use SamuelKubala\TaskManagement\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TimeEntriesController extends Controller
{
    public function index()
    {
        return TimeEntry::all();
    }

    public function store(Request $request)
    {
        return TimeEntry::create($request->all());
    }

    public function show($id)
    {

        return TimeEntry::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $entry = TimeEntry::findOrFail($id);
        $entry->update($request->all());
        return $entry;
    }

    public function destroy($id)
    {
        return TimeEntry::destroy($id);
    }
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
    }
    public function stopTracking($task_id)
    {
        $entry = $this->isTaskTracked($task_id);
        if (!$entry) {
            return response(['error' => 'Task is curently not tracked.', 'statusCode' => '400'], 400);
        }
        $entry->endtime = Carbon::now()->toDateTimeString();
        $entry->save();
    }
}
