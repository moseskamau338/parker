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
    public function store(Request $request)
    {
        if (!$request->name){
            session()->flash('notification', (object)[
                 'color'=>'red',
                 'message' => 'Site name cannot be empty'
             ]);
        }
        try {
            Zone::create([
                'name'=>$request->name,
            ]);
            session()->flash('notification', (object)[
                 'color'=>'green',
                 'message' => 'Site created successfully!'
             ]);
        }catch(\Throwable $e){
            session()->flash('notification', (object)[
                 'color'=>'red',
                 'message' => 'Site creation failed!'.$e->getMessage()
             ]);
        }
        return back();
    }
}
