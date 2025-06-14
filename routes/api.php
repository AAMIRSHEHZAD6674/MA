<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspectionController;
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

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('login', [InspectionController::class, 'login']);

Route::post('/add',[InspectionController::class,'store']);

Route::post('/upload', function(Request $request) {
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();

        $path = $file->storeAs('upload', $originalName, 'public');
        return response()->json(['uploadedPath' => $path]);

    }

    return response()->json(['error' => 'No file uploaded'], 400);
});




