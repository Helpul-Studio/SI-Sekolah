<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/parent-login', [ParentController::class, 'login']);
Route::post('/teacher-login', [TeacherController::class, 'login']);
Route::post('/student-login', [StudentController::class, 'login']);

Route::post('/parent', [ParentController::class, 'store']);
Route::post('/student', [StudentController::class, 'store']);
Route::post('/teacher', [TeacherController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/parent-logout', [ParentController::class, 'logout']);
    Route::post('/student-logout', [StudentController::class, 'logout']);
    Route::post('/teacher-logout', [TeacherController::class, 'logout']);
    
    Route::post('/parent/{id}', [ParentController::class, 'update']);
    Route::delete('/parent/{id}', [ParentController::class, 'destroy']);
    
    Route::post('/student/{id}', [StudentController::class, 'update']);
    Route::delete('/student/{id}', [StudentController::class, 'destroy']);

    Route::post('/teacher/{id}', [TeacherController::class, 'update']);
    Route::delete('/teacher/{id}', [TeacherController::class, 'destroy']);

    Route::post('/course', [CourseController::class, 'store']);
    Route::put('/course/{id}', [CourseController::class, 'update']);
    Route::delete('/course/{id}', [CourseController::class, 'destroy']);

    Route::post('/grade', [GradeController::class, 'store']);
    Route::put('/grade/{id}', [GradeController::class, 'update']);
    Route::delete('/grade/{id}', [GradeController::class, 'destroy']);

    Route::post('/classroom', [ClassroomController::class, 'store']);
    Route::put('/classroom/{id}', [ClassroomController::class, 'update']);
    Route::delete('/classroom/{id}', [ClassroomController::class, 'destroy']);

    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);

    Route::post('/exam', [ExamController::class, 'store']);
    Route::put('/exam/{id}', [ExamController::class, 'update']);
    Route::delete('/exam/{id}', [ExamController::class, 'destroy']);

    Route::post('/exam-type', [ExamTypeController::class, 'store']);
    Route::put('/exam-type/{id}', [ExamTypeController::class, 'update']);
    Route::delete('/exam-type/{id}', [ExamTypeController::class, 'destroy']);

    Route::post('/exam-result', [ExamResultController::class, 'store']);
    Route::put('/exam-result/{id}', [ExamResultController::class, 'update']);
    Route::delete('/exam-result/{id}', [ExamResultController::class, 'destroy']);

    Route::post('/classroom-student', [ClassroomStudentController::class, 'store']);
    Route::put('/classroom-student/{id}', [ClassroomStudentController::class, 'update']);
    Route::delete('/classroom-student/{id}', [ClassroomStudentController::class, 'destroy']);
});


Route::get('/parent', [ParentController::class, 'index']);
Route::get('/parent/{id}', [ParentController::class, 'show']);


Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);


Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'show']);


Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);


Route::get('/grade', [GradeController::class, 'index']);
Route::get('/grade/{id}', [GradeController::class, 'show']);


Route::get('/classroom', [ClassroomController::class, 'index']);
Route::get('/classroom/{id}', [ClassroomController::class, 'show']);


Route::get('/attendance', [AttendanceController::class, 'index']);
Route::get('/attendance/{id}', [AttendanceController::class, 'show']);


Route::get('/exam', [ExamController::class, 'index']);
Route::get('/exam/{id}', [ExamController::class, 'show']);


Route::get('/exam-type', [ExamTypeController::class, 'index']);
Route::get('/exam-type/{id}', [ExamTypeController::class, 'show']);


Route::get('/exam-result', [ExamResultController::class, 'index']);
Route::get('/exam-result/{id}', [ExamResultController::class, 'show']);


Route::get('/classroom-student', [ClassroomStudentController::class, 'index']);
Route::get('/classroom-student/{id}', [ClassroomStudentController::class, 'show']);
