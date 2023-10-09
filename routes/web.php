<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FileController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('loginuser', [LoginController::class, 'store']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('adduser', [RegisterController::class, 'store'])->name('adduser');
Route::get('logout', [LoginController::class, 'signOut'])->name('logout');

//course
Route::get('course', [CourseController::class, 'index'])->name('course');
Route::get('addcourse', [CourseController::class, 'create'])->name('addcourse')->middleware('auth');
Route::post('addnewcourse', [CourseController::class, 'store'])->name('addnewcourse');
Route::delete('deletecourse/{course}', [CourseController::class, 'destroy'])->name('deletecourse');
Route::get('editcourse/{code}/{name}', [CourseController::class, 'edit'])->name('editcourse');
Route::put('updatecourse/{name}', [CourseController::class, 'update'])->name('updatecourse');

//teachercourse
Route::post('addcourseteacher', [TeacherCourseController::class, 'store'])->name('addcourseteacher');
Route::delete('deletecourseteacher/{t_id}/{c_id}', [TeacherCourseController::class, 'destroy'])->name('deletecourseteacher');
Route::get('viewteachers', [TeacherCourseController::class, 'index'])->name('viewteachers');
Route::get('addteacher', [TeacherCourseController::class, 'create'])->name('addteacher');


//users
Route::get('profile', [UserController::class, 'show'])->name('profile');
Route::get('viewusers/{filter?}', [UserController::class, 'index'])->name('viewusers');
Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
Route::put('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
Route::delete('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');

//enroll
Route::get('enroll',  [EnrollController::class, 'create'])->name('enroll');
Route::post('enrollcourse/{course_id}', [EnrollController::class, 'store'])->name('enrollcourse');
Route::get('enrolledcourses',  [EnrollController::class, 'index'])->name('enrolledcourses');

//change password
Route::get('setpassword', [SetPasswordController::class, 'create'])->name('setpassword');
Route::put('changepassword', [SetPasswordController::class, 'update'])->name('changepassword');
Route::get('resetpassword', [ChangePasswordController::class, 'index'])->name('resetpassword');
Route::put('updatepassword', [ChangePasswordController::class, 'update'])->name('updatepassword');


//coursecontent
Route::get('coursemenu', [TeacherCourseController::class, 'show'])->name('coursemenu');
Route::get('coursedetail/{course_id}',[AnnouncementController::class, 'create'])->name('coursedetail');
Route::post('createpost/{course_id}',[AnnouncementController::class, 'store'])->name('createpost');
Route::delete('deletemessage/{id}', [AnnouncementController::class, 'destroy'])->name('deletemessage');

//course student
Route::get('coursestudents/{course_id}', [EnrollController::class, 'show'])->name('coursestudents');

// Route::view('sidebar', 'layouts.sidebar');
//assignment

Route::view('assignment', 'assignment.assignmentform');

Route::view('classwork', 'classwork');

//forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// //file management
// Route::post('uploadfile', [FileController::class, 'store'])->name('uploadfile');


//assignment
Route::get('classwork/{course_id}',[AssignmentController::class, 'index'])->name('classwork');
Route::get('createassignment/{course_id}',[AssignmentController::class, 'create'])->name('createassignment');
Route::post('postassignment{course_id}',[AssignmentController::class, 'store'])->name('postassignment');


Route::get('downloadfile/{file_id}',[FileController::class, 'download'])->name('downloadfile');