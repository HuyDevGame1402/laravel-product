<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <h1>Chi tiết sản phẩm</h1>

    <p><b>Tên:</b> {{ $product->name }}</p>
    <p><b>Giá:</b> {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
    <p><b>Số lượng:</b> {{ $product->stock }}</p>
    <p><b>Mô tả:</b> {{ $product->description }}</p>

    <a href="{{ route('product.index') }}">Quay lại danh sách</a>
</body>
</html>
