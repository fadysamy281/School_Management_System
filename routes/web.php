<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\Questions\QuestionController;

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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

     //==============================dashboard============================
    Route::get('/dashboard', [HomeController::class , 'index'])->name('dashboard');

   //==============================dashboard============================
        Route::resource('Grades', GradeController::class);

    //==============================Classrooms============================
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class , 'delete_all'])->name('delete_all');

        Route::post('Filter_Classes', [ClassroomController::class , 'Filter_Classes'])->name('Filter_Classes');



    //==============================Sections============================


        Route::resource('Sections', SectionController::class);

        Route::get('/classes/{id}', [SectionController::class , 'getclasses']);


    //==============================parents============================

         Route::view('add_parent','livewire.show_Form');

    //==============================Teachers============================
        Route::resource('Teachers', TeacherController::class);

    //==============================Students============================
        Route::resource('Students', StudentController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Fees_Invoices', FeesInvoicesController::class);
        Route::resource('Fees', FeesController::class);
        Route::resource('receipt_students', ReceiptStudentsController::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentController::class);
        Route::resource('Attendance', AttendanceController::class);
        Route::get('/Get_classrooms/{id}', [StudentController::class , 'Get_classrooms']);
        Route::get('/Get_Sections/{id}', [StudentController::class , 'Get_Sections']);
        Route::post('Upload_attachment', [StudentController::class , 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class , 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class , 'Delete_attachment'])->name('Delete_attachment');

    //==============================subjects============================
        Route::resource('subjects', SubjectController::class);

    //==============================Quizzes============================
        Route::resource('Quizzes', QuizzController::class);

    //==============================questions============================
        Route::resource('questions', QuestionController::class);
});
