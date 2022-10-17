<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public static function options(): array
    {
         $methods = ['' => 'Any'];
        foreach(Gateway::all('id', 'name')->toArray() as $key=>$value){
           $methods[$value['id']] = $value['name'];
        }
        return $methods;
    }
}
