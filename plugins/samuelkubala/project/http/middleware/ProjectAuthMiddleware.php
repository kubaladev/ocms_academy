<?php

namespace SamuelKubala\Project\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class ProjectAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $project_id = $request->route('id');
        $user_id = auth()->user()->id;
        $has_access = DB::table('samuelkubala_project_users_projects')
            ->where('user_id', $user_id)->where('project_id', $project_id)->first();
        if (is_null($has_access)) {
            return response(['error' => 'Access Denied' . $has_access, 'statusCode' => '401'], 401);
        }
        $response = $next($request);
        return $response;
    }
}
