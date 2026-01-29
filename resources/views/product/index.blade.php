<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <a href="{{ route('product.add') }}">Thêm mới sản phẩm</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($products as $p)
            <li>
                {{ $p->name }} - {{ number_format($p->price, 0, ',', '.') }} VNĐ - Stock: {{ $p->stock }}
                - <a href="{{ route('product.detail', ['id' => $p->id]) }}">Xem chi tiết</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
