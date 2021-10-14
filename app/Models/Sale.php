<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const VALIDATION_RULES = [
         'customer_id' => 'exists:App\Models\Customer,id',
        'vehicle_id' => 'exists:App\Models\Vehicle,id',
        'rate_id' => 'exists:App\Models\Rate,id',
        'zone_id' => 'exists:App\Models\Zone,id',
        // 'entry_time' => 'date_format:Y-m-d H:i:s',
        //extra
        'gateway_id' => 'exists:App\Models\Gateway,id',
        // 'leave_time' => 'date_format:Y-m-d H:i:s',
        'payed_at' => 'date_format:Y-m-d H:i:s',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    //sale
    public function duration()
    {
        //calculates the time between entry and leave
        //if no leave time, use now
        if (!$this->leave_time){
            return Carbon::now()->diffInSeconds(Carbon::now(), false);
        }else{
            return Carbon::parse($this->leave_time)->diffInSeconds(Carbon::parse($this->entry_time));
        }

    }
}
