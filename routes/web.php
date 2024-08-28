<?php

use App\Models\Task;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of tkhem will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //dd(Task::hasMacro('concatData'));

    $task = Task::find(2); // Assuming you have a Task instance

    return response()->json(["data" => Str::toUpperCase($task->title)]);
});



Route::get("http_sender", function () {
    $response = Http::local()->post('/api/Login');
    //dd($response);

    return response()->json(["status" => $response]);
});
