<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    //helper
    public function hasActiveSubscription()
    {
        //check if in list of active subscriptions
        if ($this->subscriptions !== null && count($this->subscriptions) > 0){
            $active_subscriptions = [];
            foreach ($this->subscriptions
                         ->where('status', 1)
                         ->where('customer_id', $this->id) as $subscription) {
             $days_remaining = $this->subscriptionDays($subscription);
                if ($days_remaining >= 0){
                    // valid
                    array_push($active_subscriptions, $subscription);
                }
            }
            if (count($active_subscriptions) > 0){
                if (count($active_subscriptions) === 1){
                    return $active_subscriptions[0];
                }else{
                    return $active_subscriptions;
                }
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function subscriptionDays(Subscription $subscription)
    {
        return Carbon::now()
            ->diffInDays(Carbon::parse($subscription->started)
                ->addDays($subscription->plan->cycle), false);

    }

    public function subscribe($plan): bool
    {
        $this->type = 'LTC';
        $this->save();

        $subscription = new Subscription();
        $subscription->customer_id = $this->id;
        $subscription->plan_id = $plan;
        $subscription->started = now();
        $subscription->status = 1;

        return $subscription->save();
    }

}
