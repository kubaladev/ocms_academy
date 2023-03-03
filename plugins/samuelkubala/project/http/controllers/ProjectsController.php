<?php

namespace SamuelKubala\Project\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use SamuelKubala\Project\Models\Project;
use RainLab\User\Models\User;
use Illuminate\Http\Request;
use SamuelKubala\Project\Http\Resources\ProjectResource;


class ProjectsController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(Request $request)
    {
        return new ProjectResource(Project::create($request->all()));
    }

    public function show($id)
    {

        return new ProjectResource(Project::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return new ProjectResource($project);
    }

    public function destroy($id)
    {
        return new ProjectResource(Project::destroy($id));
    }
    public function closeproject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->isclosed) {
            return response(['error' => 'Project is allready closed', 'statusCode' => '400'], 400);
        }
        $project->isclosed = true;
        $project->save();
        return new ProjectResource($project);
    }
    public function showtasks($id)
    {
        $project = Project::findOrFail($id);
        return $project->tasks()->get();
    }
    public function test(Request $request)
    {
        app()->singleton('test', function () {
            return true;
        });

        return (app('Illuminate\Http\Request') == $request);
    }
}
