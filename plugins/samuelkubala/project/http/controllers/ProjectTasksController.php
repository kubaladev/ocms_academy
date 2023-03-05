<?php

namespace SamuelKubala\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use SamuelKubala\Project\Models\Project;

class ProjectTasksController extends Controller
{
    //Show all tasks for current project
    public function showAllTasks($id)
    {
        $project = Project::findOrFail($id);
        return $project->tasks()->get();
    }

    //Show logged users tasks for current project
    public function showMyTasks($id)
    {
        return $this->showAllTasks($id)->where('user_id', auth()->user()->id)->get();
    }
}
