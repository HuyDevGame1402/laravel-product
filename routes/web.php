<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductControllerDatabase;

Route::get('/enter-age', function () {
    return view('enter-age'); // view có form POST nhập tuổi
})->name('enter-age');

Route::post('/enter-age', function (Request $request) {
    $age = (int)$request->input('age');
    $request->session()->put('age', $age);
    return redirect()->route('home'); // sau khi lưu tuổi → quay về home
})->name('enter-age.post');

Route::middleware([CheckTimeAccess::class, CheckAge::class])->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductControllerDatabase::class, 'index'])->name('index');        // danh sách sản phẩm
        Route::get('/add', [ProductControllerDatabase::class, 'create'])->name('add');      // form thêm
        Route::post('/add', [ProductControllerDatabase::class, 'store'])->name('add.post'); // lưu sản phẩm mới
        Route::get('/{id}', [ProductControllerDatabase::class, 'show'])->name('detail');    // chi tiết sản phẩm
    });

    Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
        return "Sinh viên: $name, MSSV: $mssv";
    })->name('sinhvien');

    Route::get('/banco/{n}', function ($n) {
        return view('banco', compact('n'));
    })->name('banco');

    Route::prefix('auth')->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });
    });

});


Route::get('/signin', [AuthController::class, 'SignIn']);
Route::post('/signin', [AuthController::class, 'CheckSignIn']);


Route::resource('test', TestComtroller::class);

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
