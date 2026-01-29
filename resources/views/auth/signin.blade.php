<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>

    <form method="POST" action="/signin">
        @csrf

        <label>Tên người dùng</label><br>
        <input type="text" name="username"><br><br>

        <label>Mật khẩu</label><br>
        <input type="password" name="password"><br><br>

        <label>Đặt lại mật khẩu</label><br>
        <input type="password" name="repass"><br><br>

        <label>MSSV</label><br>
        <input type="text" name="mssv"><br><br>

        <label>Lớp môn học</label><br>
        <input type="text" name="lopmonhoc"><br><br>

        <label>Giới tính</label><br>
        <select name="gioitinh">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select><br><br>

        <button type="submit">Sign In</button>
    </form>
</body>
</html>
