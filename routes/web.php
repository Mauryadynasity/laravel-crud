<?php

use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/emp-login', [App\Http\Controllers\DemoController::class, 'userLogin']);

Route::get('/user-details', [App\Http\Controllers\DemoController::class, 'userForm']);
Route::post('/save-employee', [App\Http\Controllers\DemoController::class, 'saveUser']);

Route::get('/calculate-distance-form', [App\Http\Controllers\DemoController::class, 'showDistanceForm']);
Route::post('/calculate-distance', [App\Http\Controllers\DemoController::class, 'calculateDistance']);


// Route for editing a file
Route::get('edit-file/{id}', [App\Http\Controllers\DemoController::class, 'edit']);

// Route for updating a file
Route::post('file-update/{id}', [App\Http\Controllers\DemoController::class, 'update']);

// Route for deleting a file
Route::delete('files/{id}', [App\Http\Controllers\DemoController::class, 'destroy']);

Route::get('/export-users', function () {
    return Excel::download(new UsersExport, 'users.csv');
});

