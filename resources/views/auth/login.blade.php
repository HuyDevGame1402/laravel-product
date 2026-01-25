<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Đăng nhập</h2>

    <form method="POST" action="#">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Đăng nhập</button>
    </form>

    <p>
        Chưa có tài khoản?
        <a href="/auth/register">Đăng ký</a>
    </p>
</body>
</html>
