<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::prefix('san-pham')->group(function(){
//     Route::get('/', [ProductController::class, 'index'])->name('product.index');

//     Route::get('remove/{id}', [ProductController::class, 'remove'])->middleware('admin-role')->name('product.remove');

//     Route::get('add', [ProductController::class, 'addForm'])->middleware('admin-role')->name('product.add');
//     Route::post('add', [ProductController::class, 'saveAdd'])->middleware('admin-role');

//     Route::get('edit/{id}', [ProductController::class, 'editForm'])->middleware('admin-role')->name('product.edit');
//     Route::post('edit/{id}', [ProductController::class, 'saveEdit'])->middleware('admin-role');

//     Route::get('chi-tiet/{id}', [ProductController::class, 'detail']);
// });
// Route::prefix('danh-muc')->group(function(){
//     Route::get('/', [CategoryController::class, 'index'])->name('category.index');
//     Route::get('/detail-category/{id}', [CategoryController::class, 'detail'])->name('category.detail');

//     Route::get('remove/{id}', [CategoryController::class, 'remove'])->name('category.remove');

//     Route::get('add', [CategoryController::class, 'addForm'])->name('category.add');
//     Route::post('add', [CategoryController::class, 'saveAdd']);

//     Route::get('edit/{id}', [CategoryController::class, 'editForm'])->name('category.edit');
//     Route::post('edit/{id}', [CategoryController::class, 'saveEdit']);
// });

// Route::prefix('tai-khoan')->group(function(){
//     Route::get('/', [UserController::class, 'index'])->name('user.index');

//     Route::get('remove/{id}', [UserController::class, 'remove'])->name('user.remove');

//     Route::get('add', [UserController::class, 'addForm'])->name('user.add');
//     Route::post('add', [UserController::class, 'saveAdd']);

//     Route::get('edit/{id}', [UserController::class, 'editForm'])->name('user.edit');
//     Route::post('edit/{id}', [UserController::class, 'saveEdit']);
// });
Route::prefix('user')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/detail-user/{id}', [UserController::class, 'detail'])->name('user.detail');

    Route::get('remove/{id}', [UserController::class, 'remove'])->middleware('admin-role')->name('user.remove');

    Route::get('add', [UserController::class, 'addForm'])->middleware('admin-role')->name('user.add');
    Route::post('add', [UserController::class, 'saveAdd'])->middleware('admin-role');

    Route::get('edit/{id}', [UserController::class, 'editForm'])->middleware('user-detail-role')->name('user.edit');
    Route::post('edit/{id}', [UserController::class, 'saveEdit'])->middleware('user-detail-role');
    Route::get('/change-password/{id}', [UserController::class, 'changePassword'])->middleware('change-password-role')->name('change-password');
    Route::post('/change-password/{id}', [UserController::class, 'saveChange'])->middleware('change-password-role');
});

Route::prefix('car')->group(function(){
    Route::get('/', [CarController::class, 'index'])->name('car.index');
    Route::get('remove/{id}', [CarController::class, 'remove'])->middleware('staff-role')->name('car.remove');

    Route::get('add', [CarController::class, 'addForm'])->middleware('staff-role')->name('car.add');
    Route::post('add', [CarController::class, 'saveAdd'])->middleware('staff-role');

    Route::get('edit/{id}', [CarController::class, 'editForm'])->middleware('staff-role')->name('car.edit');
    Route::post('edit/{id}', [CarController::class, 'saveEdit'])->middleware('staff-role');
});
Route::prefix('passenger')->group(function(){
    Route::get('/', [PassengerController::class, 'index'])->name('passenger.index');
    Route::get('remove/{id}', [PassengerController::class, 'remove'])->middleware('staff-role')->name('passenger.remove');

    Route::get('add', [PassengerController::class, 'addForm'])->middleware('staff-role')->name('passenger.add');
    Route::post('add', [PassengerController::class, 'saveAdd'])->middleware('staff-role');

    Route::get('edit/{id}', [PassengerController::class, 'editForm'])->middleware('staff-role')->name('passenger.edit');
    Route::post('edit/{id}', [PassengerController::class, 'saveEdit'])->middleware('staff-role');
});

Route::any('forbiddance-admin', function (){
    return "Trang này danh cho admin, bạn không có quyền truy cập";
})->name('forbiddance-admin');

Route::any('forbiddance-staff', function (){
    return "Trang này danh cho nhân viên, bạn không có quyền truy cập";
})->name('forbiddance-staff');

Route::any('forbiddance-detail', function (){
    return "Bạn không thể thay đổi thông tin của tài khoản khác";
})->name('forbiddance-detail');

Route::any('forbiddance-change-password', function (){
    return "Bạn không thể thay đổi mật khẩu của tài khoản khác";
})->name('forbiddance-change-password');

Route::resource("users", UserController::class);

?>