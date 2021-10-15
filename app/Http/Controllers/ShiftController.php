<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function handovers(Request $request)
    {
        return view('shifts.handovers');
    }
}
