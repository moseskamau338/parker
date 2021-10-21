<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        return view('zones.index');
    }
    public function show(Request $request, Zone $zone)
    {
        return view('zones.show', compact('zone'));
    }
}
