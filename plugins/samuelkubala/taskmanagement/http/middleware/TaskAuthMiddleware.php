<?php

namespace SamuelKubala\TaskManagement\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use SamuelKubala\TaskManagement\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $task_id = $request->route('id');
        $user_id = auth()->user()->id;
        $task = Task::findOrFail($task_id)->first();
        if (!$task->owner_id == $user_id) {
            return response(['error' => 'Access denied.', 'status' => 403], 403);
        }
        $response = $next($request);
        return $response;
    }
}
