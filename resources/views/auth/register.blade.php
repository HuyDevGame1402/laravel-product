<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Đăng ký</h2>

    <form method="POST" action="#">
        @csrf

        <label>Tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Nhập lại mật khẩu:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Đăng ký</button>
    </form>

    <p>
        Đã có tài khoản?
        <a href="/auth/login">Đăng nhập</a>
    </p>
</body>
</html>
