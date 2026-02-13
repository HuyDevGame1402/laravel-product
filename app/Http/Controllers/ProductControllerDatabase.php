<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductControllerDatabase extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::all();
        $title = 'Danh sách sản phẩm';
        return view('product.index', compact('products', 'title'));
    }

    // Form thêm mới sản phẩm
    public function create()
    {
        $title = 'Thêm sản phẩm mới';
        return view('product.add', compact('title'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index') // <-- sửa từ products.index
                         ->with('success', 'Thêm sản phẩm thành công!');
    }

    // Xem chi tiết sản phẩm
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $title = 'Chi tiết sản phẩm';
        return view('product.detail', compact('product', 'title'));
    }

    // Form sửa sản phẩm
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $title = 'Sửa sản phẩm';
        return view('product.edit', compact('product', 'title'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index') // <-- sửa từ products.index
                         ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index') // <-- sửa từ products.index
                         ->with('success', 'Xóa sản phẩm thành công!');
    }
}
