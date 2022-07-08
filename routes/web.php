<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\RoutineXIController;
use App\Http\Controllers\Admin\RoutineXIIController;

use App\Http\Controllers\Admin\Students\AllStudentsController;
use App\Http\Controllers\Admin\Students\XIStudentsController;
use App\Http\Controllers\Admin\Students\XIIStudentsController;
use App\Http\Controllers\Admin\Students\OldStudentsController;
use App\Http\Controllers\Admin\Students\HscExamineeController;

use App\Http\Controllers\Admin\Teachers\TeachersController;
use App\Http\Controllers\Admin\Teachers\DeptTeachersController;

use App\Http\Controllers\Admin\Admission\SecurityCodeController;
use App\Http\Controllers\Admin\Admission\AdmissionController;

use App\Http\Controllers\Admin\Download\IDcardController;
use App\Http\Controllers\Admin\Download\TestimonialController;
use App\Http\Controllers\Admin\Download\TransCertController;

use App\Http\Controllers\User\NoticeViewController;

use App\Http\Controllers\User\Posts\PostsController;
use App\Http\Controllers\User\Posts\LikesController;
use App\Http\Controllers\User\Posts\CommentsController;

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

Route::group(['middleware' => 'auth'], function() {
    //__Home routes
    Route::get('/home', [UserController::class, 'index'])->name('home');

    //__User profile routes
    Route::get('profile/{id}', [UserController::class, 'profile'])->name('user.profile');

    //__Notice routes
    Route::get('/notice', [NoticeViewController::class, 'index'])->name('notice.view');

    //__Post routes
    Route::resource('/posts', PostsController::class);
    Route::resource('/posts/like', LikesController::class);
    Route::resource('/posts/comment', CommentsController::class);

    //__Videos route
    Route::get('/videos', [UserController::class, 'videos'])->name('videos');

    //__Routine route
    Route::get('/routines', [UserController::class, 'routines'])->name('routines');
    Route::get('/routines/export/{class}/{dept}', [UserController::class, 'export'])->name('routines.export');

});


// __Admission routes
Route::get('/admission/procedure', function () {
    return view('admission.admission_procedure');
})->name('admission.procedure');

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

    // __Teacher routes
    Route::resource('/admin/teachers', TeachersController::class);
    Route::get('/admin/teachers-science', [DeptTeachersController::class, 'science'])->name('admin.teachers-science');
    Route::get('/admin/teachers-humanities', [DeptTeachersController::class, 'humanities'])->name('admin.teachers-humanities');
    Route::get('/admin/teachers-business', [DeptTeachersController::class, 'business'])->name('admin.teachers-business');

    // __Admission routes
    Route::resource('/admin/admission/security_code', SecurityCodeController::class);

    // __Download routes
    Route::get('/admin/students/idcard/generate/{id}', [IDcardController::class, 'generate'])->name('admin.students.idcard.generate');
    Route::get('/admin/teachers/idcard/generate/{id}', [IDcardController::class, 'teachers_id_generate'])->name('admin.teachers.idcard.generate');

    Route::get('/admin/download/testimonial', [TestimonialController::class, 'index'])->name('admin.download.testimonial');
    Route::post('/admin/download/testimonial/generate', [TestimonialController::class, 'generate'])->name('admin.download.testimonial.generate');

    Route::get('/admin/download/tc', [TransCertController::class, 'index'])->name('admin.download.tc');
    Route::post('/admin/download/tc/generate', [TransCertController::class, 'generate'])->name('admin.download.tc.generate');

});
