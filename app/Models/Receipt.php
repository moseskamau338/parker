<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
