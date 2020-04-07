<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FormatInquiryData
{
    public function handle(Request $request, Closure $next)
    {
        $data = $request->except(['dates', 'guests']);

        if ($dates = $request->get('dates')) {
            $dates = collect($dates)->map(function ($date) {
                return date('Y-m-d', strtotime($date));
            });
            [$from, $to] = $dates->all();
            $data += compact('from', 'to');
        }

        if ($guests = $request->get('guests')) {
            $data += $guests;
        }

        $request->replace($data);
        return $next($request);
    }
}
