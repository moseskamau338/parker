<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const VALIDATION_RULES = [
        'customer_id' => 'exists:App\Models\Customer,id',
        'customer' => 'string',
        'rate_id' => 'exists:App\Models\Rate,id',
        // 'entry_time' => 'date_format:Y-m-d H:i:s',
        //extra
        'gateway_id' => 'exists:App\Models\Gateway,id',
        // 'leave_time' => 'date_format:Y-m-d H:i:s',
        'payed_at' => 'date_format:Y-m-d H:i:s',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
    public function gateway(): BelongsTo
    {
        return $this->belongsTo(Gateway::class);
    }
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
    //sale
    public function duration()
    {
        //calculates the time between entry and leave
        //if no leave time, use now
        if (!$this->leave_time){
            return (Carbon::parse($this->created_at)->diffInSeconds(Carbon::now('Africa/Nairobi'), false));
        }else{
            return Carbon::parse($this->leave_time)->diffInSeconds(Carbon::parse($this->created_at));
        }

    }
    //helpers
     public function getParkingFee($exitTime): Object
    {
        $entryTime = $this->created_at;
        $fee=0;
        $exT=date("Y-m-d H:i:s", strtotime($exitTime));
        $enT=date("Y-m-d H:i:s", strtotime($entryTime));

        $totalSecondsDiff = (strtotime($exT)-strtotime($enT));
        $totalMinutesDiff = $totalSecondsDiff/60;

        $duration=$totalMinutesDiff;
        if($duration>=0){
            if(($duration>=0)&&($duration<16)){$fee=0;}
            elseif(($duration>=16)&&($duration<=60)){$fee=50;}
            elseif(($duration>=61)&&($duration<=120)){$fee=150;}
            elseif(($duration>=121)&&($duration<=180)){$fee=250;}
            elseif(($duration>=181)&&($duration<=240)){$fee=350;}
            elseif($duration>240){
                $init=350;
                $diff=(int)(($duration-240)/60);//7.9round up get full and modulus
                if(($diff%60)>0){
                    $fee=($init+(100*$diff))+100;
                }else{$fee=($init+(100*$diff));}
            }
        }else{$fee=-99;}
            //return floor($duration)." Min  at  Ksh".$fee;
            return (object)['fee'=>$fee, 'time'=>floor($duration)];
    }
}
