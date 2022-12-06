<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ProfessorController;
use App\Http\Controllers\Api\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// USER

route::post('register', [UserController::class, 'register']); // REGISTRO USER
route::post('login', [UserController::class, 'login']); // LOGIN USER


Route::group(['middleware' => ["auth:sanctum"]], function () { // AUTH USER (Se necesita un token válido)
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::post('readUsers', [UserController::class, 'readUsers']);

    Route::group(['middleware' => ['permission:prof-mod']], function () { // PERMISO MODIFICAR PROFESSOR
        Route::post('createProfessor', [ProfessorController::class, 'createProfessor']);
        Route::post('destroyProfessor', [ProfessorController::class, 'destroyProfessor']);
        Route::post('updateProfessor', [ProfessorController::class, 'updateProfessor']);
    });
    Route::group(['middleware' => ['permission:prof-read']], function () { // PERMISO LEER PROFESSOR
        Route::post('readProfessor', [ProfessorController::class, 'readProfessor']);
    });
    Route::group(['middleware' => ['permission:student-mod']], function () { // PERMISO MODIFICAR STUDENT
        Route::post('createStudent', [StudentController::class, 'createStudent']);
        Route::post('destroyStudent', [StudentController::class, 'destroyStudent']);
        Route::post('updateStudent', [StudentController::class, 'updateStudent']);
    });
    Route::group(['middleware' => ['permission:student-read']], function () { // PERMISO LEER STUDENT
        Route::post('readStudent', [StudentController::class, 'readStudent']);
    });
    Route::group(['middleware' => ['permission:course-mod']], function () { // PERMISO MODIFICAR COURSE
        Route::post('createCourse', [CourseController::class, 'createCourse']);
        Route::post('destroyCourse', [CourseController::class, 'destroyCourse']);
        Route::post('updateCourse', [CourseController::class, 'updateCourse']);
    });
    Route::group(['middleware' => ['permission:course-read']], function () { // PERMISO LEER CURSO
        Route::post('readCourse', [CourseController::class, 'readCourse']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
