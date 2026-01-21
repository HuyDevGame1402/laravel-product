<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('product.add') }}">Thêm mới sản phẩm</a>
    <ul>
        @foreach ($products as $p)
            <li>{{ $p['name'] }} - {{ $p['price'] }} - 
                <a href="{{ route('product.detail', ['id' => $p['id']]) }}">Xem chi tiết</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
