<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /product
    public function index()
    {
        $tile = "Product List";
        $products = [
            ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 100],
            ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 200],
        ];

        return view('product.index', compact('products'));
    }

    // GET /product/add
    public function add()
    {
        return view('product.add');
    }

    // POST /product/add
    public function store(Request $request)
    {
        $name  = $request->input('name');
        $price = $request->input('price');

        return "Đã thêm sản phẩm: $name, giá: $price";
    }

    // GET /product/{id}
    public function detail($id)
    {
        $products = [
            ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 100],
            ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 200],
        ];

        // Tìm sản phẩm theo id
        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }

        // Nếu không có sản phẩm
        if (!$product) {
            abort(404);
        }

        return view('product.detail', compact('product'));
    }
    

}
