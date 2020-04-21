<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Events\Inquired;
use App\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{

    public function store(Request $request)
    {
        $accommodation = Accommodation::findByCode($request->get('accommodation'));
        $inquiry = Inquiry::make($request->except('accommodation'));
        $inquiry->accommodation()->associate($accommodation);
        $inquiry->save();

        event(new Inquired($inquiry));

        return $inquiry;
    }

    public function list()
    {
        return Inquiry::all();
    }

    public function show(Inquiry $inquiry)
    {
        return $inquiry;
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $inquiry->update($request->all());
        return $inquiry;
    }

    public function destroy(Inquiry $inquiry)
    {
        return $inquiry->delete();
    }
}
