<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Wizard\IndexController;
use App\Http\Controllers\Wizard\BasicInfoController;
use App\Http\Controllers\Wizard\PassportInfoController;
use App\Http\Controllers\Wizard\PromotionInfoController;
use App\Http\Controllers\Wizard\MedDecoInfoController;
use App\Http\Controllers\Wizard\ServiceInfoController;
use App\Http\Controllers\Wizard\AppointmentInfoController;
use App\Http\Controllers\Wizard\ContactInfoController;
use App\Http\Controllers\Wizard\HigherEducationInfoController;
use App\Http\Controllers\Wizard\AcademicInfoController;
use App\Http\Controllers\Wizard\MilitaryCourseInfoController;
use App\Http\Controllers\Wizard\ChildrenInfoController;
use App\Http\Controllers\Wizard\SpouseInfoController;
use App\Http\Controllers\Wizard\HobbyInfoController;
use App\Http\Controllers\Wizard\LanguagesInfoController;
use App\Http\Controllers\Wizard\FoodInfoController;
use App\Http\Controllers\Wizard\VaccineInfoController;
use App\Http\Controllers\Wizard\ExportAppFormController;
use App\Http\Controllers\SecureDownloadController;
use \App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/',function (){
    return redirect(url('/login'));
});
Route::get('/appform/public/',[HomeController::class,'index']);

Auth::routes();
Route::get('/refresh-captcha', [RegisterController::class, 'refreshCaptcha']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'wizard', 'middleware' => ['auth','checkuser']], function () {
    Route::get('index', [IndexController::class, 'index'])->name('wizard.stepone');

    Route::post('basicinfo/save', [BasicInfoController::class, 'save'])->name('basicinfo.save');
    Route::get('basicinfo/index', [BasicInfoController::class, 'index'])->name('basicinfo.index');
    Route::delete('basicinfo/delete/{userid}', [BasicInfoController::class, 'delete'])->name('basicinfo.delete');

    Route::post('passportinfo/save', [PassportInfoController::class, 'save'])->name('passportinfo.save');
    Route::get('passportinfo/index', [PassportInfoController::class, 'index'])->name('passportinfo.index');

    Route::post('promitioninfo/save', [PromotionInfoController::class, 'save'])->name('promotioninfo.save');
    Route::get('promotioninfo/index', [PromotionInfoController::class, 'index'])->name('promotioninfo.index');

    Route::post('meddecoinfo/save', [MedDecoInfoController::class, 'save'])->name('meddecoinfo.save');
    Route::get('meddecoinfo/index', [MedDecoInfoController::class, 'index'])->name('meddecoinfo.index');
    Route::delete('meddecoinfo/delete/{id}', [MedDecoInfoController::class, 'delete'])->name('meddecoinfo.delete');

    Route::post('serviceinfo/save', [ServiceInfoController::class, 'save'])->name('serviceinfo.save');
    Route::get('serviceinfo/index', [ServiceInfoController::class, 'index'])->name('serviceinfo.index');

    Route::post('appointmentinfo/save', [AppointmentInfoController::class, 'save'])->name('appointmnentinfo.save');
    Route::get('appointmentinfo/index', [AppointmentInfoController::class, 'index'])->name('appointmnentinfo.index');
    Route::delete('appointmentinfo/delete/{id}', [AppointmentInfoController::class, 'delete'])->name('appointmentinfo.delete');

    Route::post('contactinfo/save', [ContactInfoController::class, 'save'])->name('contactinfo.save');
    Route::get('contactinfo/index', [ContactInfoController::class, 'index'])->name('contactinfo.index');

    Route::post('highereduinfo/save', [HigherEducationInfoController::class, 'save'])->name('highereduinfo.save');
    Route::get('highereduinfo/index', [HigherEducationInfoController::class, 'index'])->name('highereduinfo.index');
    Route::delete('highereduinfo/delete/{id}', [HigherEducationInfoController::class, 'delete'])->name('highereduinfo.delete');


    Route::post('contactinfo/save', [ContactInfoController::class, 'save'])->name('contactinfo.save');
    Route::get('contactinfo/index', [ContactInfoController::class, 'index'])->name('contactinfo.index');
    Route::delete('contactinfo/delete/{id}', [ContactInfoController::class, 'delete'])->name('contactinfo.delete');


    Route::post('academiceduinfo/save', [AcademicInfoController::class, 'save'])->name('academicinfo.save');
    Route::get('academiceduinfo/index', [AcademicInfoController::class, 'index'])->name('academicinfo.index');
    Route::delete('academiceduinfo/delete/{id}', [AcademicInfoController::class, 'delete'])->name('academicinfo.delete');


    Route::post('militarycourseinfo/save', [MilitaryCourseInfoController::class, 'save'])->name('militarycourseinfo.save');
    Route::get('militarycourseinfo/index', [MilitaryCourseInfoController::class, 'index'])->name('militarycourseinfo.index');
    Route::delete('militarycourseinfo/delete/{id}', [MilitaryCourseInfoController::class, 'delete'])->name('militarycourseinfo.delete');

    Route::post('childreninfo/save', [ChildrenInfoController::class, 'save'])->name('childreninfo.save');
    Route::get('childreninfo/index', [ChildrenInfoController::class, 'index'])->name('childreninfo.index');
    Route::delete('childreninfo/delete/{id}', [ChildrenInfoController::class, 'delete'])->name('childreninfo.delete');
    Route::get('spouseinfo/index', [SpouseInfoController::class, 'index'])->name('spouseinfo.index');

    Route::post('hobbiesinfo/save', [HobbyInfoController::class, 'save'])->name('hobbiesinfo.save');
    Route::get('hobbiesinfo/index', [HobbyInfoController::class, 'index'])->name('hobbiesinfo.index');
    Route::delete('hobbiesinfo/delete/{id}', [HobbyInfoController::class, 'delete'])->name('hobbiesinfo.delete');

    Route::post('langinfo/save', [LanguagesInfoController::class, 'save'])->name('langinfo.save');
    Route::get('langinfo/index', [LanguagesInfoController::class, 'index'])->name('langinfo.index');

    Route::post('foodprefinfo/save', [FoodInfoController::class, 'save'])->name('foodprefinfo.save');
    Route::get('foodprefinfo/index', [FoodInfoController::class, 'index'])->name('foodprefinfo.index');

    Route::post('vaccineinfo/save', [VaccineInfoController::class, 'save'])->name('vaccineinfo.save');
    Route::get('vaccineinfo/index', [VaccineInfoController::class, 'index'])->name('vaccineinfo.index');
    Route::delete('vaccineinfo/delete/{id}', [VaccineInfoController::class, 'delete'])->name('vaccineinfo.delete');


});

Route::get('exportappform/generate/{userid?}', [ExportAppFormController::class, 'createPDF'])->name('exportappform.generate')->middleware(['auth']);



Route::group(['prefix' => 'secure', 'middleware' => 'auth'], function () {
    Route::get('certificate/{view?}/{userid}/{filename}/', [SecureDownloadController::class, 'certificate']);
    Route::get('profileimg/{filename}', [SecureDownloadController::class, 'profileImage']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','checkadmin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
