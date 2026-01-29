<!DOCTYPE html>
<html>
<head>
    <title>Nhập tuổi</title>
</head>
<body>
    <h1>Nhập tuổi của bạn</h1>
    <form method="POST" action="{{ route('enter-age.post') }}">
        @csrf
        <label>Tuổi: <input type="number" name="age" required></label>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
