<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("tasks", [TaskController::class, "index"]);
Route::post("task/create", [TaskController::class, "store"]);
Route::put("task/edit/{id}", [TaskController::class, "update"]);
Route::put("task/delete/{id}", [TaskController::class, "destroy"]);


Route::get("http_handler", function () {
    return response()->json(["status" => "ok"]);
});
