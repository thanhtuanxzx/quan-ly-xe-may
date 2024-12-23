<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\XeMayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\ChuXeController;
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

Route::get('/', [UserController::class, 'index']);


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/banggia-sanpham', [UserController::class, 'banggiasanpham']);
Route::get('/chinh-sach-baoduong', [UserController::class, 'chinhsachbd']);
Route::get('/chinh-sach-baohanh', [UserController::class, 'chinhsachhbb']);
Route::get('/chitiet-sanpham', [UserController::class, 'chitietsanpham']);
Route::get('/lien-he-mua-hang', [UserController::class, 'lienhemuahang']);
Route::get('/sanpham', [UserController::class, 'sanpham']);
Route::get('/thong-tin', [UserController::class, 'thongtin']);
Route::get('/index', [UserController::class, 'index']);
Route::post('/lienhe-submit', [UserController::class, 'submit'])->name('lienhe.submit');


Route::prefix('admin')->middleware('auth')->group(function () {
 
    Route::get('add-motor', [AdminController::class, 'addMotor'])->name('admin.add_motor');
    Route::get('detail-motor', [AdminController::class, 'detailMotor'])->name('admin.detail_motor');
// Route để hiển thị form chỉnh sửa xe
    Route::get('edit-motor', [AdminController::class, 'editMotor'])->name('admin.edit_motor');
    Route::put('admin/motor/update/{id}', [AdminController::class, 'update'])->name('admin.update_motor');


    Route::get('delete', [AdminController::class, 'deleteMotor'])->name('admin.delete_motor');
    Route::get('list-motor', [AdminController::class, 'listMotor'])->name('admin.list_motor');
 
    Route::get('vehicle-lookup', [AdminController::class, 'search'])->name('motor.search');
    Route::post('/admin/store_motor', [AdminController::class, 'store'])->name('admin.store_motor');


    Route::get('/account-admin', [AdminController::class, 'accountAdmin'])->name('admin.account');
    Route::get('/add-customer', [AdminController::class, 'addCustomer'])->name('admin.add.customer');
    // Route::post('/admin/add-nguoi-dung', [AdminController::class, 'addnguoidung'])->name('admin.addnguoidung');
    Route::get('/search-vehicle', [AdminController::class, 'searchcustomer'])->name('vehicle.search');
    Route::post('/chu-xe', [AdminController::class, 'addnguoidung'])->name('admin.addnguoidung');
    Route::get('/edit-customer', [AdminController::class, 'editCustomer'])->name('admin.edit.customer');
    Route::post('/update-customer', [AdminController::class, 'updateCustomer'])->name('update-customer');
    Route::get('/history-customer', [AdminController::class, 'historyCustomer'])->name('admin.history.customer');

    Route::get('list-customer', [ChuXeController::class, 'listCustomer'])->name('admin.list.customer');
    Route::get('/statistical', [AdminController::class, 'statistical'])->name('admin.statistical');
    Route::get('/trade-maintenance', [AdminController::class, 'tradeMaintenance'])->name('admin.trade.maintenance');
    // Route::get('/trade-motor', [AdminController::class, 'tradeMotor'])->name('admin.trade.motor'); //Bị nớp
    Route::post('/trader',[AdminController::class,'trade'])->name('admin.trade');
    Route::get('/transaction-list', [AdminController::class, 'transactionList'])->name('admin.transaction.list');
    // Route::post('/process-form', [AdminController::class, 'processForm'])->name('processForm'); //Nớp theo

    Route::get('/edit-admin', [AdminController::class, 'editAD'])->name('admin.edit.admin')->middleware('role:Admin');
    Route::get('/list-admin', [AdminController::class, 'listAD'])->name('admin.list.admin')->middleware('role:Admin');
    Route::get('/add-admin', [AdminController::class, 'addAD'])->name('admin.add.admin')->middleware('role:Admin');

    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');

    Route::get('/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/list-admin', [AdminController::class, 'themad'])->name('nguoidung.store')->middleware('role:Admin');
    Route::get('/delete-admin', [AdminController::class, 'deleteAdmin'])->name('delete.admin')->middleware('role:Admin');
    Route::put('list-admin', [AdminController::class, 'updateAdmin'])->name('admin.update')->middleware('role:Admin');
});
// Route::get('/admin', function () {
//     return 'Chào mừng Admin!';
// })->middleware('role:Admin');

// Route::get('/nhanvien', function () {
//     return 'Chào mừng Nhân viên!';
// })->middleware('role:Nhân viên');
// Route::get('/email/verify/{token}', [LoginController::class, 'verifyEmail'])->name('email.verify');

// Route để hiển thị form quên mật khẩu
Route::get('/password/forget', [LoginController::class, 'showForgetPasswordForm'])->name('password.forget.form');

// Route để xử lý quên mật khẩu
Route::post('/password/forget', [LoginController::class, 'forgetPassword'])->name('password.forget');

// Route để hiển thị form reset mật khẩu
Route::get('/password/reset', [LoginController::class, 'verifyEmail'])->name('reset.form');


// Route để xử lý đặt lại mật khẩu
Route::post('/passwordreset', [LoginController::class, 'resetPassword'])->name('pw.reset');