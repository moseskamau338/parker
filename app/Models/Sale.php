<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        // make readable:
        $minutes = Carbon::parse($this->created_at)->diffInMinutes(Carbon::parse($this->leave_time));
    
        $d = floor ($minutes / 1440);
        $h = floor (($minutes - $d * 1440) / 60);
        $m = $minutes - ($d * 1440) - ($h * 60);

        //$res="{$d}days {$h}hours {$m}min";
        $res="{$h}hours {$m}min";
        return $res;

    }
    //helpers
     public function getMidnightOfTimestamp($timestamp)
     {
        $timestamp_datetime=date("Y-m-d H:i:s", strtotime($timestamp));
        $timestamp_date = date('Y-m-d', strtotime($timestamp_datetime));
        return date("Y-m-d H:i:s", strtotime($timestamp_date." 23:59:59"));
    }//end getMidnightOfTimestamp
     public function getParkingFee($exitTime): Object
    {
        $entryTime = $this->created_at;
        $fee=0;
        $exT=date("Y-m-d H:i:s", strtotime($exitTime));
        $enT=date("Y-m-d H:i:s", strtotime($entryTime));
        $midnightT=$this->getMidnightOfTimestamp($entryTime);

        $totalSecondsDiff = (strtotime($exT)-strtotime($enT));
        $totalMinutesDiff = intval($totalSecondsDiff/60);

        $totalSecondsDiffMidnight = (strtotime($midnightT)-strtotime($enT));
        $totalMinutesDiffMidnight = intval($totalSecondsDiffMidnight/60);

        $duration=$totalMinutesDiff;
        if($duration>$totalMinutesDiffMidnight){
           $duration=$totalMinutesDiffMidnight;
        }

        if($duration>=0){
            if(($duration>=0)&&($duration<16)){$fee=0;}
            elseif(($duration>=16)&&($duration<=240)){$fee=100;}
            elseif(($duration>=241)&&($duration<=360)){$fee=150;}
            elseif(($duration>=361)&&($duration<=480)){$fee=200;}
            elseif(($duration>=481)&&($duration<=720)){$fee=300;}
            elseif($duration>720){
                $init=300;
                $diff=(int)(($duration-720)/60);//7.9round up get full and modulus
                if(($diff%60)>0){
                $fee=($init+(50*$diff))+50;
                }else{$fee=($init+(50*$diff));}
            }
        }else{$fee=-99;}
        //return floor($duration)." Min  at  Ksh".$fee;
        return (object)['fee'=>$fee, 'time'=>floor($duration)];
    }

    public function markLost()
    {
        // $totals = $this->getParkingFee(Carbon::now('Africa/Nairobi'))->fee;
        $this->totals = 0;
        $this->status = 'LOSS';
        $this->leave_time = Carbon::now('Africa/Nairobi');
        $this->payed_at = Carbon::now('Africa/Nairobi');
        $this->gateway_id = 3;

        $this->save();
    }
}
