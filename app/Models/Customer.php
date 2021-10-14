<?php

namespace App\Models;

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

    //helper
    public function hasActiveSubscription()
    {
        //check if in list of active subscriptions
    }
}
