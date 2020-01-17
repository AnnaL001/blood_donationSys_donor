<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "donors";
    protected $primaryKey = "donor_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'surname', 'email', 'password','phoneNo', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'geolocation'
    ];

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }

    public function response()
    {
        return $this->hasMany('App\DonorResponse');
    }

}
