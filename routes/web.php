<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Trang chủ
Route::get('/', function () {
    return view('home'); 
})->name('home');

// Nhóm route /product
Route::prefix('product')->name('product.')->group(function () {

    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 100],
            ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 200],
        ];
        return view('product.index', compact('products'));
    })->name('index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('add');

    Route::post('/add', function (\Illuminate\Http\Request $request) {
        $name = $request->input('name');
        $price = $request->input('price');
        return "Đã thêm sản phẩm: $name, giá: $price";
    })->name('add.post');

    Route::get('/{id}', function ($id) {
        return "Chi tiết sản phẩm với ID = $id";
    })->name('detail');
});




// Route sinhvien
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return "Sinh viên: $name, MSSV: $mssv";
})->name('sinhvien');

// Route bàn cờ
Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
})->name('banco');

// Route fallback cho 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
