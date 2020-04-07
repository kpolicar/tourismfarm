<?php

namespace App\Http\Controllers\Api;

use App\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{

    public function store(Request $request)
    {
        return Inquiry::create($request->all());
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
