<?php

namespace SamuelKubala\TaskManagement\Http\Controllers;

use Illuminate\Routing\Controller;
use SamuelKubala\TaskManagement\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }

    public function show($id)
    {

        return Task::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }

    public function destroy($id)
    {
        return Task::destroy($id);
    }
}
