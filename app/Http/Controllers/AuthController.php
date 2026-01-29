<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Trả về view SignIn
    public function SignIn()
    {
        return view('auth.signin');
    }

    // Xử lý form đăng ký
    public function CheckSignIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $repass   = $request->repass;
        $mssv     = $request->mssv;
        $lop      = $request->lopmonhoc;
        $gioitinh = $request->gioitinh;

        // Thông tin sinh viên làm bài (CỐ ĐỊNH)
        if (
            $username === 'Hieulx' &&
            $password === '123abc' &&
            $repass === '123abc' &&
            $mssv === '26867' &&
            $lop === '67PM1' &&
            $gioitinh === 'nam'
        ) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }
}
