<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\RoutineXIController;
use App\Http\Controllers\Admin\RoutineXIIController;
use App\Http\Controllers\Admin\Students\AllStudentsController;
use App\Http\Controllers\Admin\Students\XIStudentsController;
use App\Http\Controllers\Admin\Students\XIIStudentsController;
use App\Http\Controllers\Admin\Students\OldStudentsController;
use App\Http\Controllers\Admin\Students\HscExamineeController;
use App\Http\Controllers\Admin\Admission\SecurityCodeController;
use App\Http\Controllers\Admin\Admission\AdmissionController;
use App\Http\Controllers\Admin\Download\IDcardController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admission/procedure', function () {
    return view('admission.admission_procedure');
})->name('admission.procedure');

// __Admission routes
Route::resource('/admission', AdmissionController::class);
Route::post('admission/verify', [AdmissionController::class, 'verify'])->name('admission.verify');

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    // __Notice routes
    Route::resource('/admin/notice', NoticeController::class);

    // __Routine routes
    Route::resource('/admin/routines_xi', RoutineXIController::class);
    Route::resource('/admin/routines_xii', RoutineXIIController::class);

    // __Student routes
    Route::resource('/admin/students', AllStudentsController::class);
    Route::resource('/admin/students_xi', XIStudentsController::class);
    Route::resource('/admin/students_xii', XIIStudentsController::class);
    Route::resource('/admin/students_old', OldStudentsController::class);
    Route::resource('/admin/hsc_examinee', HscExamineeController::class);

    // __Admission routes
    Route::resource('/admin/admission/security_code', SecurityCodeController::class);

    // __Download routes
    Route::get('/admin/download/idcard', [IDcardController::class, 'index'])->name('admin.download.idcard');
    Route::get('/admin/students/idcard/download/{id}', [IDcardController::class, 'download'])->name('admin.students.idcard.download');

});
