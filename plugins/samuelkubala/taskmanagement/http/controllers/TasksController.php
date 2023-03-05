<?php

namespace SamuelKubala\TaskManagement\Http\Controllers;

use Illuminate\Routing\Controller;
use SamuelKubala\TaskManagement\Models\Task;
use SamuelKubala\Project\Http\Controllers\ProjectUsersController;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    public function index()
    {
        return Task::where('owner_id', auth()->user()->id)->get();
    }

    public function store(Request $request)
    {
        $projectUsersController = new ProjectUsersController();
        $task = Task::make($request->all());
        $task->owner_id = auth()->user()->id;
        if (!$projectUsersController->isUserInProject($task->project_id, auth()->user()->id)) {
            return response(['error' => 'Project not accessible for logged user', 'status' => '403'], 403);
        }
        $task->save();
        return $task;
    }

    public function show($id)
    {
        return Task::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $projectUsersController = new ProjectUsersController();
        if (!$projectUsersController->isUserInProject($request->project_id, auth()->user()->id)) {
            return response(['error' => 'Project not accessible for logged user', 'status' => '403'], 403);
        }
        $task->update($request->all());
        return $task;
    }

    public function destroy($id)
    {
        return Task::destroy($id);
    }

    public function getProject($id)
    {
        return Task::findOrFail($id)->project()->get();
    }

    public function getTimeEntries($id)
    {
        return Task::findOrFail($id)->entries()->get();
    }

    public function isTaskTracked($id)
    {
        $entries = $this->getTimeEntries($id);
        foreach ($entries as $entry) {
            if ($entry->endtime == null) {
                return $entry;
            }
        }
        return false;
    }
}
