<?php

use App\Http\Controllers\ExamMasterController;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// //For storage linking on cpanel

//Do not delete this 
// Route::get('/linkstorage', function () {
//     $targetFolder = base_path().'/storage/app/public';
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//     symlink($targetFolder, $linkFolder);
//  });


Route::get('/Files', [App\Http\Controllers\FileUploadController::class, 'index'])->name('Files.index');

Route::get('/Files/create', [App\Http\Controllers\FileUploadController::class, 'create'])->name('Files.create');
Route::post('/Files', [App\Http\Controllers\FileUploadController::class, 'store'])->name('Files.store');
Route::get('/Files/show', [App\Http\Controllers\FileUploadController::class, 'show'])->name('Files.show');

Route::delete('/Files/{file}', [App\Http\Controllers\FileUploadController::class, 'destroy'])->name('Files.destroy');
Route::post('/Files/file', [App\Http\Controllers\FileUploadController::class, 'getAllFiles'])->name('Files.file');
Route::get('/Files/{id}/edit', [App\Http\Controllers\FileUploadController::class, 'edit'])->name('Files.edit');
Route::patch('/Files/{id}', [App\Http\Controllers\FileUploadController::class, 'update'])->name('Files.update');


Route::resource('/CoursesS', App\Http\Controllers\student\StudentCourseController::class);
Route::get('/getCoursesS/{name}', [App\Http\Controllers\student\StudentCourseController::class,'getCourses']);
Route::get('/getCoursesTypeS', [App\Http\Controllers\student\StudentCourseController::class,'courseType'])->name('getCoursesTypeS');
Route::get('/getCoursesByCourseType/{name}', [App\Http\Controllers\student\StudentCourseController::class,'getCoursesByCourseType']);


Route::get('changePasswordSt', [App\Http\Controllers\student\StudentController::class, 'showChangePass'])->name('ChangePasswordST');
Route::post('/reChangePasswordSt', [App\Http\Controllers\student\StudentController::class, 'ChangePass'])->name('reChangePasswordST');
Route::get('editProfileSt/{id}/edit', [App\Http\Controllers\student\StudentController::class, 'edit'])->name('editProfileST');
// Route::post('/updateProfileSt', [App\Http\Controllers\student\StudentController::class, 'update'])->name('updateProfileST ');
Route::post('updateProfileSt', [App\Http\Controllers\student\StudentController::class, 'update'])->name('updateProfileSt');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/sslget',function(){
    return view('SSL.paymentSuccess');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/successa', function () {
    return view('student.success');
});
Route::post('requestLogin', [App\Http\Controllers\UserController::class, 'authenticate']);
Route::get('/register', function () {
    return view('student.register');
});
Route::post('registerStudent', [App\Http\Controllers\StudentController::class, 'create']);


Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => ['role:Student Free|Student Silver|Student Platinum|Student Gold']], function () {
    Route::get('Home', function () {
        return view('student.home');
    });
    Route::get('Pricing', function () {
        return view('student.priceing');
    });
    Route::get('Learn', [App\Http\Controllers\student\StudentLearn::class, 'Learn']);
    Route::get('Exams', [App\Http\Controllers\student\StudentLearn::class, 'Exams']);
    Route::get('SubjectS/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'Subject']);

    Route::get('getPaper/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getPaperBySubject']);
    Route::get('getPaperSL/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getPaperBySubjectSL']);
    Route::get('getChapterS/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getChapterByPaper']);
    Route::get('getChapterSL/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getChapterByPaperSL']);
    Route::get('getQuestionS/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getQuestionByChapter']);
    Route::get('getcontentSL/{ID}', [App\Http\Controllers\student\StudentLearn::class, 'getContentSL']);
});


Route::get('answer', [App\Http\Controllers\AnswerController::class, 'index']);
Route::post('questionanswercheck', [App\Http\Controllers\AnswerController::class, 'store']);
Route::get('submissionresponse\{id}', [App\Http\Controllers\AnswerController::class, 'handleFormSubmission']);
Route::get('showResult/{id}', [App\Http\Controllers\ExamMasterController::class, 'showResult']);


Route::group(['middleware' => ['role:Super Admin|Admin|Editor|Question Editor']], function () {

    Route::get('/Dashboard', function () {
        return view('dashboard');
    })->middleware('auth');

    Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('profile');
    Route::get('ChangePassword', [App\Http\Controllers\UserController::class, 'showChangePass'])->name('ChangePassword');
    Route::post('regChangePassword', [App\Http\Controllers\UserController::class, 'ChangePass']);

    Route::resource('Subject', App\Http\Controllers\SubjectController::class);
    Route::post('/subject/list', [App\Http\Controllers\SubjectController::class, 'getAllSubject'])->name('/subject/list');

    Route::resource('Content', App\Http\Controllers\ContentController::class);
    Route::get('Content/View/{id}', [App\Http\Controllers\ContentController::class, 'view']);
    Route::post('/content/list', [App\Http\Controllers\ContentController::class, 'getAllContent'])->name('/content/list');

    Route::resource('Paper', App\Http\Controllers\PaperController::class);
    Route::post('/paper/list', [App\Http\Controllers\PaperController::class, 'getAllPaper'])->name('/paper/list');

    Route::resource('Chapter', App\Http\Controllers\ChapterController::class);
    Route::post('/chapter/list', [App\Http\Controllers\ChapterController::class, 'getAllChapter'])->name('/chapter/list');
    Route::post('getPaper', [App\Http\Controllers\ChapterController::class, 'getpaperList']);

    Route::resource('Question', App\Http\Controllers\QuestionController::class);
    Route::post('/Question/list', [App\Http\Controllers\QuestionController::class, 'getAllQuestion'])->name('/Question/list');
    Route::post('getChapter', [App\Http\Controllers\QuestionController::class, 'getChapterList']);
    Route::get('showOptions/{QuestionID}', [App\Http\Controllers\QuestionController::class, 'showOptions']);

    Route::resource('Permission', App\Http\Controllers\PermissionController::class);
    Route::post('/Permission/list', [App\Http\Controllers\PermissionController::class, 'getAllpermission'])->name('/Permission/list');
    Route::get('permission/{id}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);


    Route::resource('roles', App\Http\Controllers\RoleConfroller::class);
    Route::get('roles/{id}/delete', [App\Http\Controllers\RoleConfroller::class, 'destroy']);
    Route::get('roles/{id}/give-permission', [App\Http\Controllers\RoleConfroller::class, 'givePermission']);
    Route::put('roles/{id}/save-permission', [App\Http\Controllers\RoleConfroller::class, 'savePermission']);

    Route::resource('User', App\Http\Controllers\UserController::class);
    Route::post('/Users/list', [App\Http\Controllers\UserController::class, 'getAllUser'])->name('/Users/list');
    Route::get('Userslist', [App\Http\Controllers\UserController::class, 'getAllUsers']);

    Route::resource('exams', ExamMasterController::class);

    Route::resource('Course', App\Http\Controllers\CourseController::class);
    // Route::get('Course/{id}/edit', [App\Http\Controllers\CourseController::class, 'edit'])->name('course.edit');
    //Route::put('Course/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('course.update');
    Route::delete('Course/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('course.destroy');
    Route::get('/Course', [App\Http\Controllers\CourseController::class, 'courses'])->name('course.index');
    Route::post('/course/list', [App\Http\Controllers\CourseController::class, 'getAllCourses'])->name('course.list');

    Route::resource('CourseType', App\Http\Controllers\CourseTypeController::class);
    Route::post('getCourseType',[ App\Http\Controllers\CourseTypeController::class,'getAllCourseType'])->name('courseType.list');



});


// SSLCOMMERZ Start
Route::get('/example1', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
