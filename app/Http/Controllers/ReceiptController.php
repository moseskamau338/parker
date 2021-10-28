<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller
{
    public function index()
    {
        return view('receipts');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'receipt' => "required|mimes:jpeg,png,pdf|max:2000",
            'amount'=>'required|numeric',
            'ref'=>'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
//        if (auth('sanctum')->user()->hasRole(['admin','manager','partner'])){
//             dd($request);
            $receipt = new Receipt();
            $receipt->receipt_id = $request->ref;
            $receipt->amount = $request->amount;
            $receipt->user_id = auth('sanctum')->id();
            $receipt->zone_id = auth('sanctum')->user()->zone->id;
             $receipt->file = $request->file('receipt')->store('receipts');
            try {
                 $receipt->save();
                 session()->flash('notification', (object)[
                     'color'=>'green',
                     'message' => 'Receipt added successfully!'
                 ]);
            }catch (\Throwable $e){
                 session()->flash('notification', (object)[
                     'color'=>'red',
                     'message' => 'Error!'.$e->getMessage()
                 ]);
            }
//        }else{
//            session()->flash('notification', (object)[
//                     'color'=>'red',
//                     'message' => 'Sorry, you are not authorized to perform this function!'
//                 ]);
//        }

        return back();

    }
}
