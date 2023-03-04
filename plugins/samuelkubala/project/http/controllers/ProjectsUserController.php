<?php

namespace SamuelKubala\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsUserController extends Controller
{
    //Set table name here
    private $table = 'samuelkubala_project_users_projects';

    private function isUserInProject($id, $user_id)
    {
        $result = DB::table($this->table)
            ->where('user_id', $user_id)
            ->where('project_id', $id)->first();
        return !is_null($result);
    }

    public function addUserToProject($id, $user_id)
    {
        if ($this->isUserInProject($id, $user_id)) {
            return response(['error' => 'User is allready assigned to this project', 'statusCode' => '400'], 400);
        }
        DB::table($this->table)->insert([
            'user_id' => $user_id,
            'project_id' => $id
        ]);
        return response(['status' => 'User assigned to the project', 'statusCode' => '201'], 201);
    }

    public function removeUserFromProject($id, $user_id)
    {
        if (!$this->isUserInProject($id, $user_id)) {
            return response(['error' => 'User is not a member of the project', 'statusCode' => '400'], 400);
        }
        DB::table($this->table)->where('user_id', $user_id)->where('project_id', $id)->delete();
        return response(['status' => 'User removed from the project', 'statusCode' => '202'], 202);
    }
}
