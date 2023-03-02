<?php

namespace SamuelKubala\Project\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use SamuelKubala\Project\Models\Project;
use RainLab\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use WApi\ApiException\Http\Middlewares;



use Illuminate\Support\MessageBag;

class ProjectsController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(Request $request)
    {
        return Project::create($request->all());
    }

    public function show($id)
    {

        return Project::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return $project;
    }

    public function destroy($id)
    {
        return Project::destroy($id);
    }
    public function closeproject($id)
    {
        $project = Project::findOrFail($id);
        if ($project->isclosed) {
            return response(['error' => 'Project allready closed', 'statusCode' => '500'], 500);
        }
        $project->isclosed = true;
        $project->save();
        return $project;
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
