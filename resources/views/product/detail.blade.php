<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
</head>
<body>

    <h1>Chi tiết sản phẩm</h1>

    <p><b>ID:</b> {{ $product['id'] }}</p>
    <p><b>Tên:</b> {{ $product['name'] }}</p>
    <p><b>Giá:</b> {{ $product['price'] }}</p>

    <a href="{{ route('product.index') }}">← Quay lại danh sách</a>

</body>
</html>
