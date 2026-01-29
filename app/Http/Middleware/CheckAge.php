<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy tuổi từ session
        $age = $request->session()->get('age');

        // Nếu request gửi tuổi mới (ví dụ từ form POST), lưu vào session
        if ($request->has('age')) {
            $age = (int)$request->input('age');
            $request->session()->put('age', $age);
        }

        // Kiểm tra tuổi
        if ($age !== null && $age < 18) {
            return response()->json([
                'message' => 'Bạn chưa đủ 18 tuổi. Không được phép truy cập.',
                'age' => $age
            ], 403);
        }

        // Nếu >= 18 hoặc chưa nhập tuổi → tiếp tục request
        return $next($request);
    }
}
