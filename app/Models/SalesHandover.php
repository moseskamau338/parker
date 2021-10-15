<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesHandover extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'from');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'to');
    }
     public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
