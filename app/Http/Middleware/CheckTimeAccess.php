<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckTimeAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now(); // giờ hiện tại theo timezone của app
        $startTime = Carbon::createFromTime(8, 0, 0);
        $endTime   = Carbon::createFromTime(21, 0, 0);

        if ($now->lt($startTime) || $now->gt($endTime)) {
            return response()->json([
                'message' => 'Ngoài giờ truy cập!',
                'current_time' => $now->toDateTimeString()
            ], 403);
        }

        return $next($request);
    }
}
