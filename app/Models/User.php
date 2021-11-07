<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'zone_id',
        'phone',
        'nat_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //relations:
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function sales_handovers()
    {
        return $this->hasMany(SalesHandover::class, 'from');
    }

    //helpers
    public function startShift()
    {
        if($this->currentShift()){
//               redirect back with must close shift
           abort(403, 'Sorry, you cannot start a new shift until the previous is ended!');
       }
        $shift = null;
        if ($this->hasRole('cashier')){
            $shift = Shift::create([
                'user_id'=>$this->id,
                'zone_id'=>$this->zone->id,
                'start'=>Carbon::now('Africa/Nairobi'),
            ]);
        }
        return $shift;
    }
    public function currentShift()
    {
        //this shifts opened latest
        $current_shifts = Shift::where('user_id',  $this->id)
            ->whereDate('start','<=', Carbon::now('Africa/Nairobi'))
            ->where('end', null)
//            ->whereDate('end', null)
            ->latest()->get();


        if(count($current_shifts) > 0){
            return $current_shifts[0];
        }else{
            return null;
        }
    }
}
