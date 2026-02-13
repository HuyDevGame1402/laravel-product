<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\ProductControllerDatabase;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;


// ==========================
// Form nhập tuổi (enter-age)
// ==========================
Route::get('/enter-age', function () {
    return view('enter-age'); // view có form POST nhập tuổi
})->name('enter-age');

Route::post('/enter-age', function (Request $request) {
    $age = (int)$request->input('age');
    $request->session()->put('age', $age);
    return redirect()->route('home'); // sau khi lưu tuổi → quay về home
})->name('enter-age.post');

// =====================================
// Nhóm route cần kiểm tra middleware
// =====================================
Route::middleware([CheckTimeAccess::class, CheckAge::class])->group(function () {

    // Home
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // =========================
    // Product module
    // =========================
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductControllerDatabase::class, 'index'])->name('index');
        Route::get('/add', [ProductControllerDatabase::class, 'create'])->name('add');
        Route::post('/add', [ProductControllerDatabase::class, 'store'])->name('add.post');
        Route::get('/{id}', [ProductControllerDatabase::class, 'show'])->name('detail');
        Route::get('/{id}/edit', [ProductControllerDatabase::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductControllerDatabase::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductControllerDatabase::class, 'destroy'])->name('destroy');
    });

    // =========================
    // Category module ✅ THÊM Ở ĐÂY
    // =========================
    Route::resource('categories', CategoryController::class);

    // =========================
    // Sinh viên
    // =========================
    Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
        return "Sinh viên: $name, MSSV: $mssv";
    })->name('sinhvien');

    // =========================
    // Banco
    // =========================
    Route::get('/banco/{n}', function ($n) {
        return view('banco', compact('n'));
    })->name('banco');

    // =========================
    // Auth views
    // =========================
    Route::prefix('auth')->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');

        Route::get('/register', function () {
            return view('auth.register');
        })->name('register');
    });
});


// =========================
// SignIn ngoài middleware
// =========================
Route::get('/signin', [AuthController::class, 'SignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'CheckSignIn'])->name('signin.post');

// =========================
// Admin (không cần route riêng, dùng layout trong view con)
// =========================
// Bạn **không cần** route /admin trả về layout.admin trực tiếp
// Route::get('/admin', function() {     
//     return view('layout.admin'); 
// });

// =========================
// Resource test (nếu có)
// =========================
Route::resource('test', TestController::class);

// =========================
// Fallback 404
// =========================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
