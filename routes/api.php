<?php

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

use App\Http\Controllers\AlumnoController;

Route::get('get-alumno', [\App\Http\Controllers\AlumnoController::class, 'getAll'])->name( 'api-getAll');
Route::put('save-alumno', [\App\Http\Controllers\Alumnocontroller::class, 'save'])->name('api-save');
Route::delete('delete-alumno/{id}', [\App\Http\Controllers\Alumnocontroller::class, 'deleteAlumno'])->name('api-deleteAlumno');
Route::post('edit-alumno/{id}', [\App\Http\Controllers\Alumnocontroller::class, 'editAlumno'])->name('api-editAlumno');
