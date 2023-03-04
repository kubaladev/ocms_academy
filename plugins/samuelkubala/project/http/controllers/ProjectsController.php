<?php

namespace SamuelKubala\Project\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use SamuelKubala\Project\Models\Project;
use RainLab\User\Models\User;
use Illuminate\Http\Request;
use SamuelKubala\Project\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\DB;

//TODO - vymysliet sposob ako uplne oddelit user logiku od project controlleru
class ProjectsController extends Controller
{
    //Returns all the projects associated with logged user
    public function index()
    {
        $user_id = auth()->user()->id;
        $project_ids = DB::table('samuelkubala_project_users_projects')
            ->where('user_id', $user_id)
            ->pluck('project_id')
            ->toArray();
        $projects = Project::whereIn('id', $project_ids)->get();
        return ProjectResource::collection($projects);
    }

    //Creates a project with owner set to logged user
    public function store(Request $request)
    {
        $project = Project::make($request->all());
        $project->owner_id = auth()->user()->id;
        $project->save();
        DB::table('samuelkubala_project_users_projects')->insert([
            'user_id' => $project->owner_id,
            'project_id' => $project->id
        ]);
        return new ProjectResource($project);
    }

    //Show data about a single project if the user can access it
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return new ProjectResource($project);
    }

    //Update the project descriptive data if the user has access to the project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return new ProjectResource($project);
    }

    //Destroy project if the logged user is the owener
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if (!$project->owner_id == auth()->user()->id) {
            return response(['error' => 'Access Denied. Only owner of the project may destroy it', 'statusCode' => '401'], 401);
        }
        return Project::destroy($id);
    }
    //If the user has access to the project, he can close the project.
    public function closeProject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->isclosed) {
            return response(['error' => 'Project is allready closed', 'statusCode' => '400'], 400);
        }
        $project->isclosed = true;
        $project->save();
        return new ProjectResource($project);
    }
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
