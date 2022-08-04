<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentMarkController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('login');
});

Auth::routes();

//login
Route::post('login-user', [LoginController::class,'login'])->name('login-user');

Route::get('home', [HomeController::class,'index'])->name('home');

//user
Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {
    Route::prefix('dashboard')->name('.dashboard')->group(function () {
        Route::get('/', [DashboardController::class,'index']);
    });
    Route::resources([
        'teacher'=>TeacherController::class,
        'term'=>TermController::class,
        'student'=>StudentController::class,
        'student-mark'=>StudentMarkController::class
    ]);
    Route::prefix('student')->name('.student')->group(function () {
        Route::get('search/teacher-list-suggestion-ajax', [StudentController::class,'teacherListSuggestionAjax'])->name('teacher-list-suggestion-ajax');
        Route::get('search/term-list-suggestion-ajax', [StudentController::class,'termListSuggestionAjax'])->name('term-list-suggestion-ajax');
        Route::get('search/student-list-suggestion-ajax', [StudentController::class,'studentListSuggestionAjax'])->name('student-list-suggestion-ajax');
    });
});
