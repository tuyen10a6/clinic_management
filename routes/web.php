<?php

use App\Http\Controllers\Admin\CustomerAdviceController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\TestTypeController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\CustomerDoctorController;
use App\Http\Controllers\Customer\CustomerChuyenKhoaController;
use App\Http\Controllers\Customer\IntroductionController;
use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\ChiDinhController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\DoctorReportController;
use App\Http\Controllers\Doctor\DoctorScheduleController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\PrescriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminDoctorScheduleController;
use App\Http\Controllers\Admin\AdminChuyenKhoaController;
use App\Http\Controllers\Admin\AdminScheduleManagerController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AdminPatientController;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('post-login');
Route::middleware(['auth-doctor'])->group(function () {
    Route::post('doctor/logout', [AuthController::class, 'logout'])->name('doctor-logout');
    Route::prefix('manager-doctor')->group(function () {
        Route::get('dashboard', [DoctorController::class, 'index'])->name('doctor-dashboard');
        Route::get('profile', [DoctorController::class, 'update'])->name('doctor-update-view');
        Route::get('schedule', [DoctorController::class, 'scheduleList'])->name('doctor-schedule-view');
        Route::get('schedule-update/{id}', [DoctorController::class, 'editScheduleDoctor'])->name('doctor-schedule-update-view');
        Route::post('schedule-post', [DoctorController::class, 'doctorScheduleStore'])->name('doctor-schedule-store');
        Route::post('schedule-update/{id}', [DoctorController::class, 'updateScheduleDoctor'])->name('doctor-schedule-update-post');
        Route::delete('schedule/delete/{id}', [DoctorController::class, 'destroy'])->name('doctor-schedule-delete');
        Route::post('update', [DoctorController::class, 'updateProfile'])->name('doctor-update');
    });
    Route::prefix('patient')->group(function () {
        Route::get('index', [PatientController::class, 'index'])->name('patient.index');
        Route::get('update/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::get('detail/{id}', [PatientController::class, 'showDetail'])->name('patient.detail');
        Route::get('create', [PatientController::class, 'create'])->name('patient.create');
        Route::post('store', [PatientController::class, 'store'])->name('patient.store');
        Route::post('update/{id}', [PatientController::class, 'update'])->name('patient.update.post');
        Route::post('destroy/{id}', [PatientController::class, 'destroy'])->name('patient.destroy.post');
    });
    Route::prefix('chi-dinh')->group(function () {
        Route::get('patient/{id}', [ChiDinhController::class, 'index'])->name('doctor.chi-dinh.index');
        Route::get('show-print/{id}', [ChiDinhController::class, 'showPrint'])->name('doctor.show-print');
        Route::post('store', [ChiDinhController::class, 'store'])->name('doctor.chi-dinh.store');
        Route::post('update/{id}', [ChiDinhController::class, 'updateStatus'])->name('doctor.chi-dinh.update');
    });
    Route::prefix('ke-don-thuoc')->group(function () {
        Route::get('index', [PrescriptionController::class, 'index'])->name('doctor.ke-don-thuoc.index');
        Route::get('show/{id}', [PrescriptionController::class, 'show'])->name('doctor.ke-don-thuoc.show');
        Route::get('create', [PrescriptionController::class, 'create'])->name('doctor.ke-don-thuoc.create');
        Route::post('post', [PrescriptionController::class, 'store'])->name('doctor.ke-don-thuoc.store');
        Route::get('print/{id}', [PrescriptionController::class, 'print'])->name('doctor.ke-don-thuoc.print');
    });
    Route::prefix('lich-kham-du-bao')->group(function () {
        Route::get('index', [DoctorScheduleController::class, 'index'])->name('doctor.lich-kham-du-bao.index');
        Route::get('edit/{id}', [DoctorScheduleController::class, 'edit'])->name('doctor.lich-kham-du-bao.edit');
        Route::post('update/{id}', [DoctorScheduleController::class, 'updateDoctorStatus'])->name('doctor.lich-kham-du-bao.update');
    });
    Route::prefix('doctor/notification')->group(function () {
         Route::get('index', [\App\Http\Controllers\Doctor\DoctorNotificationController::class, 'index'])->name('doctor.notification.index');
        Route::get('create', [\App\Http\Controllers\Doctor\DoctorNotificationController::class, 'create'])->name('doctor.notification.create');
        Route::post('send', [\App\Http\Controllers\Doctor\DoctorNotificationController::class, 'send'])->name('doctor.notification.send');
    });
    Route::prefix('doctor/report')->group(function () {
        Route::get('index', [DoctorReportController::class, 'index'])->name('doctor.report.index');
    });

});
Route::middleware(['auth-admin'])->group(function () {
    Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin-logout');
    Route::prefix('test-type')->group(function () {
        Route::get('index', [TestTypeController::class, 'index'])->name('test-type.index');
        Route::get('edit/{id}', [TestTypeController::class, 'edit'])->name('test-type.edit');
        Route::post('store', [TestTypeController::class, 'store'])->name('admin.test-types.store');
        Route::post('update/{id}', [TestTypeController::class, 'update'])->name('admin.test-types.update');
        Route::post('destroy/{id}', [TestTypeController::class, 'destroy'])->name('admin.test-types.destroy');
    });
    Route::prefix('admin-doctor')->group(function () {
        Route::get('index', [AdminDoctorController::class, 'index'])->name('admin.doctor.index');
        Route::get('edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctor.edit');
        Route::get('show/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctor.show');
        Route::post('update/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctor.update');
        Route::get('create', [AdminDoctorController::class, 'create'])->name('admin.doctor.create');
        Route::post('store', [AdminDoctorController::class, 'store'])->name('admin.doctor.store');
    });
    Route::prefix('admin-doctor-schedule')->group(function () {
        Route::get('index', [AdminDoctorScheduleController::class, 'index'])->name('admin.doctor.schedule.index');
        Route::post('/admin/doctor-schedule/{id}/toggle-status', [AdminDoctorScheduleController::class, 'toggleStatus'])->name('admin.doctor_schedule.toggleStatus');
    });
    Route::prefix('chuyen-khoa')->group(function () {
        Route::get('index', [AdminChuyenKhoaController::class, 'index'])->name('admin.chuyen-khoa.index');
        Route::get('create', [AdminChuyenKhoaController::class, 'create'])->name('admin.chuyen-khoa.create');
        Route::get('edit/{id}', [AdminChuyenKhoaController::class, 'edit'])->name('admin.chuyen-khoa.edit');
        Route::post('store', [AdminChuyenKhoaController::class, 'store'])->name('admin.chuyen-khoa.store');
        Route::post('destroy/{id}', [AdminChuyenKhoaController::class, 'destroy'])->name('admin.chuyen-khoa.destroy');
        Route::post('update/{id}', [AdminChuyenKhoaController::class, 'update'])->name('admin.chuyen-khoa.update');
    });
    Route::prefix('customer-advice')->group(function () {
        Route::get('index', [CustomerAdviceController::class, 'index'])->name('admin.customer-advice.index');
        Route::get('edit/{id}', [CustomerAdviceController::class, 'edit'])->name('admin.customer-advice.edit');
        Route::post('update/{id}', [CustomerAdviceController::class, 'update'])->name('admin.customer-advice.update');
    });
    Route::prefix('medicines')->group(function () {
        Route::get('/', [MedicineController::class, 'index'])->name('medicines.index');
        Route::get('/create', [MedicineController::class, 'create'])->name('medicines.create');
        Route::post('/store', [MedicineController::class, 'store'])->name('medicines.store');
        Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('medicines.edit');
        Route::post('update/{id}', [MedicineController::class, 'update'])->name('medicines.update');
        Route::post('/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
    });
    Route::prefix('quan-ly-lich-kham')->group(function () {
        Route::get('index', [AdminScheduleManagerController::class, 'index'])->name('admin.quan-ly-lich-kham.index');
        Route::get('show/{id}', [AdminScheduleManagerController::class, 'show'])->name('admin.quan-ly-lich-kham.show');
    });
    Route::prefix('admin/notification')->group(function () {
        Route::get('index', [NotificationController::class, 'index'])->name('admin.notification.index');
        Route::get('create', [NotificationController::class, 'create'])->name('admin.notification.create');
        Route::post('send', [NotificationController::class, 'send'])->name('admin.notification.send');
    });
    Route::prefix('admin/report')->group(function () {
        Route::get('index', [ReportController::class, 'index'])->name('admin.report.index');
    });
   Route::prefix('ho-so-benh-an')->group(function () {
      Route::get('index', [AdminPatientController::class, 'index'])->name('admin.ho-so-benh-an.index');
      Route::get('show/{id}', [AdminPatientController::class, 'show'])->name('admin.ho-so-benh-an.show');
   });
});
// Customer
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/customer-schedule', [CustomerDoctorController::class, 'customerSchedule'])->name('customer_schedule_doctor');
Route::post('customer-advice/store', [CustomerAdviceController::class, 'store'])->name('customer_advice.store');
Route::get('/doctor/{id}', [CustomerDoctorController::class, 'index'])->name('doctor.show');
Route::get('chuyen-khoa/{id}', [CustomerChuyenKhoaController::class, 'index'])->name('chuyen-khoa.index');
// Doctor
Route::get('introduction', [IntroductionController::class, 'index'])->name('introduction.index');
Route::get('thiet-bi-y-te', [IntroductionController::class, 'thietBiYTe'])->name('thiet-bi-y-te.index');
Route::get('search-doctor', [HomeController::class, 'searchDoctor'])->name('search-doctor');
Route::get('chinh-sach-bao-hiem', [HomeController::class, 'chinhSachBaoHiem'])->name('chinh-sach-bao-hiem.index');
Route::get('chinh-sach-khach-hang', [HomeController::class, 'chinhSachKhachHang'])->name('chinh-sach-khach-hang.index');
