<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
           'data' => $tasks,
           'message' => $tasks.isEmpty() ? 'No tasks created yet' : null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|max:60',
           'description' => 'required|max:100',
           'due_date' => 'required|date|after:tomorrow',
           'status' => 'required|boolean',
           'user_id' => 'required|integer|exists:users,id',
        ]);
        Log::info('request validated');

        $task = Task::create($validatedData);
        Log::info('task created', ['task' => $task]);
        return response()->json($task);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        if(!$task) {
            return response()->json(['message' => 'task not found'], 404);
        }

        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task)
    {
        $task = Task::findOrFail($task);
        if(!$task) {
            return response()->json(['message' => 'task not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'description' => 'required|max:100',
            'due_date' => 'required|date|after:tomorrow',
            'status' => 'required|boolean',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        Log::info('request validated');

        $task->update($validatedData);
        Log::info('task updated', ['task' => $task]);
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task = Task::findOrFail($task);
        if(!$task) {
            return response()->json(['message' => 'task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'task deleted']);
    }
}
