<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
     public function users()
     {
         return $this->hasMany(User::class);
     }
}
