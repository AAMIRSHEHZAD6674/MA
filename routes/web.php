<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\UserController;
use App\Models\Inspection;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::resource('users', UserController::class);
Route::resource('targets', TargetController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/office/{office}/tehsils', [OfficeController::class, 'getTehsils']);
Route::get('/get-offices-by-district', [OfficeController::class, 'getOfficesByDistrict'])->name('get.offices.by.district');


Route::get('/reports/district', [ReportController::class, 'districtReport'])->name('reports.district');
Route::get('/reports/user-wise', [ReportController::class, 'userWise'])->name('reports.user-wise');
Route::get('/reports/tehsil', [ReportController::class, 'tehsilReport'])->name('reports.tehsil');
Route::get('/reports/school-wise', [ReportController::class, 'schoolWiseReport'])->name('reports.school');
Route::get('/reports/daily-inspection-summary', [ReportController::class, 'dailyInspectionSummary'])->name('reports.daily');
Route::get('/reports/staff-attendance-summary', [ReportController::class, 'staffAttendanceSummary'])->name('reports.staff_attendance');
Route::get('/reports/student-attendance-summary', [ReportController::class, 'studentAttendanceSummary'])->name('reports.student_attendance');
Route::get('/reports/offices-performance', [ReportController::class, 'officesPerformance'])->name('reports.offices_performance');
Route::get('/reports/inspection-vs-target', [ReportController::class, 'inspectionVsTargetReport'])->name('reports.inspection-vs-target');














