<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Thêm mới sản phẩm</h1>
    <form action="{{ route('product.add.post') }}" method="POST">
        @csrf
        <label>Tên sản phẩm: <input type="text" name="name"></label><br>
        <label>Giá: <input type="number" name="price"></label><br>
        <button type="submit">Thêm</button>
    </form>

</body>
</html>
