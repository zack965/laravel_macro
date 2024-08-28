<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        return response()->json(["data" => Task::all()]);
    }

    public function store(CreateTaskRequest $request)
    {

        $validatedData = $request->only(["description", "title"]);
        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }


    public function update(EditTaskRequest $request, string $id)
    {
        //
        $validatedData = $request->only(["description", "title"]);


        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return response()->json($task);
    }


    public function destroy(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
