<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function shifts()
    {
        return view('shifts.index');
    }
    public function handovers(Request $request)
    {
        return view('shifts.handovers');
    }

}
