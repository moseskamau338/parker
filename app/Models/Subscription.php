<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Subscription extends Model
{
    use HasFactory;
    public function plan(): Relation
    {
        return $this->belongsTo(Plan::class);
    }
    public function sale(): Relation
    {
        return $this->hasOne(Sale::class);
    }

    public function customer(): Relation
    {
        return $this->belongsTo(Customer::class);
    }
}
