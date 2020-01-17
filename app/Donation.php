<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';
    protected $primaryKey = 'record_id';
    protected $fillable = ['donor_id','branch_id','blood_quantityInPints'];

    public function branch(){
        return $this->belongsTo('App\Branch', 'branch_id','branch_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'donor_id','donor_id');
    }
}
