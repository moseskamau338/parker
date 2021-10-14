<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
    public function sale(){
        return $this->hasOne(Sale::class);
    }
}
