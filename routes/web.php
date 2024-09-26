<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WorkoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/workout', [UserController::class, 'workout'])->name('user.workout');
Route::get('/feedback', [UserController::class, 'feedback'])->name('user.feedback');
Route::post('/feedback/send/', [UserController::class, 'sendFeedback'])->name('user.send_feedback');
Route::get('/profiles', [UserController::class, 'userProfile'])->name('user.profile');
Route::get('/successPurchase', )->name('user.successPurchase');
Route::post('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/password/{id}/edit', [UserController::class, 'editpassword'])->name('user.edit_password');
Route::post('/user/password/{id}/', [UserController::class, 'passwordUpdate'])->name('user.change_password');

// auth
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/forgetpassword', [AuthController::class, 'forgetpassword'])->name('auth.forgetpassword');
    Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('auth.reset');
    Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('auth.registerUser');
    Route::post('/LoginUser', [AuthController::class, 'LoginUser'])->name('auth.loginUser');
    Route::post('/forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('auth.forget');
    Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('auth.resetpsw');

    Route::get('/workout', [UserController::class, 'workout'])->name('user.workout');
    Route::get('/feedback', [UserController::class, 'feedback'])->name('user.feedback');
    Route::get('/profiles', [UserController::class, 'Userprofile'])->name('user.profile');
    Route::get('/successPurchase', )->name('user.successPurchase');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    //purchase
    Route::get('/purchased', [PurchaseController::class, 'index'])->name('member.purchase');
    Route::get('/purchased/recheck', [PurchaseController::class, 'recheck'])->name('purchase.recheck');
    Route::post('/purchasedMember', [PurchaseController::class, 'store'])->name('user.purchaseMember');
    Route::post('/get-price', [PurchaseController::class, 'getPrice'])->name('get.price');
    Route::post('/Bmicalculate',[PurchaseController::class, 'calculateBMI'])->name('purchase.bmicalculate');

});

Route::middleware(['user'])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/forgetpassword', [AuthController::class, 'forgetpassword'])->name('auth.forgetpassword');
    Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('auth.reset');
    Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('auth.registerUser');
    Route::post('/LoginUser', [AuthController::class, 'LoginUser'])->name('auth.loginUser');
    Route::post('/forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('auth.forget');
    Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('auth.resetpsw');


    Route::get('/workout', [UserController::class, 'workout'])->name('user.workout');
    Route::get('/feedback', [UserController::class, 'feedback'])->name('user.feedback');
    Route::get('/profiles', [UserController::class, 'Userprofile'])->name('user.profile');
    Route::get('/successPurchase', )->name('user.successPurchase');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    //purchase
    Route::get('/purchased', [PurchaseController::class, 'index'])->name('member.purchase');
    Route::get('/purchased/recheck', [PurchaseController::class, 'recheck'])->name('purchase.recheck');
    Route::post('/purchasedMember', [PurchaseController::class, 'store'])->name('user.purchaseMember');
    Route::post('/get-price', [PurchaseController::class, 'getPrice'])->name('get.price');
    Route::get('/purchasedHistory', [UserController::class, 'purchaseHistory'])->name('purchaseHistory');
    Route::post('/Bmicalculate',[PurchaseController::class, 'calculateBMI'])->name('purchase.bmicalculate');

});

// admin
Route::group(['middleware' => ['admin']], function () {

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //Excel export and import
    Route::get('/export-users', [UserController::class, 'exportUsers'])->name('export.users');
    Route::get('/export-instructors', [InstructorController::class, 'exportInstructors'])->name('export.instructors');
    Route::get('/export-members', [UserController::class, 'exportMembers'])->name('export.members');
    Route::get('/file-import/user', [UserController::class, 'importView'])->name('importusers');
    Route::post('/import/user', [UserController::class, 'import'])->name('import');
    Route::get('/file-imports/instructor', [UserController::class, 'importViews'])->name('import-views');
    Route::post('/imports/instructor', [UserController::class, 'imports'])->name('imports');
    Route::get('/file-import/member', [UserController::class, 'importV'])->name('import-member');
    Route::post('/import/member', [UserController::class, 'import_Views'])->name('import-members');

    // admin user
    Route::get('/admin/user', [UsersController::class, 'user'])->name('admin.user');
    Route::get('/admin/user/create', [UsersController::class, 'create'])->name('admin.create_user');
    Route::post('/admin/user/store', [UsersController::class, 'store'])->name('admin.store_user');
    Route::get('/admin/user/edit/{id}', [UsersController::class, 'edit'])->name('admin.edit_user');
    Route::post('/admin/user/update/{id}', [UsersController::class, 'update'])->name('admin.update_user');
    Route::delete('/admin/user/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.destroy_user');
    Route::get('/admin/user/password/{id}/edit', [UsersController::class, 'editpassword'])->name('admin.user.change_password');
    Route::post('/admin/user/password/{id}/change', [UsersController::class, 'passwordUpdate'])->name('admin.user.change_password');

    // admin workout
    Route::get('/admin/workout', [WorkoutController::class, 'workout'])->name('admin.workout');
    Route::get('/admin/workout/create', [WorkoutController::class, 'create'])->name('admin.create_workout');
    Route::post('/admin/workout/store', [WorkoutController::class, 'store'])->name('admin.store_workout');
    Route::get('/admin/workout/edit/{id}', [WorkoutController::class, 'edit'])->name('admin.edit_workout');
    Route::post('/admin/workout/update/{id}', [WorkoutController::class, 'update'])->name('admin.update_workout');
    Route::delete('/admin/workout/destroy/{id}', [WorkoutController::class, 'destroy'])->name('admin.destroy_workout');
    Route::get('/admin/workout/search', [WorkoutController::class, 'search'])->name('admin.search_workout');

    //admin instructor

    Route::get('/admin/instructor', [InstructorController::class, 'instructor'])->name('admin.instructor');
    Route::get('/admin/instructor/create', [InstructorController::class, 'create'])->name('admin.create_instructor');
    Route::post('/admin/instructor/store', [InstructorController::class, 'store'])->name('admin.store_instructor');
    Route::get('/admin/instructor/{id}/edit', [InstructorController::class, 'edit'])->name('admin.edit_instructor');
    Route::put('/admin/instructor/{id}', [InstructorController::class, 'update'])->name('admin.update_instructor');
    Route::delete('/admin/instructor/destroy/{id}', [InstructorController::class, 'destroy'])->name('admin.destroy_instructor');

    //admin discount
    Route::get('/admin/discount', [DiscountController::class, 'get'])->name('admin.discount');
    Route::get('/admin/discount/create', [DiscountController::class, 'create'])->name('admin.create_discount');
    Route::post('/admin/discount/store', [DiscountController::class, 'store'])->name('admin.store_discount');
    Route::get('/admin/discount/edit/{id}', [DiscountController::class, 'edit'])->name('admin.edit_discount');
    Route::post('/admin/discount/update/{id}', [DiscountController::class, 'update'])->name('admin.update_discount');
    Route::delete('/admin/discount/destroy/{id}', [DiscountController::class, 'destroy'])->name('admin.destroy_discount');

    //admin member
    Route::get('/admin/member', [MemberController::class, 'member'])->name('admin.member');
    Route::delete('/admin/member/destroy/{id}', [MemberController::class, 'destroy'])->name('admin.destroy_member');

    //admin feedback
    Route::get('admin/feedback' , [AdminController::class , 'feedback'])->name('admin.feedback');

});
