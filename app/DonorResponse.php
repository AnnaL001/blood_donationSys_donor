<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorResponse extends Model
{
    protected $table = 'donor_responses';
    protected $primaryKey = 'response_id';
    protected $fillable = ['donor_id','response_text','request_id'];

    public function request(){
        return $this->belongsTo('App\BloodRequest', 'request_id','request_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'donor_id','donor_id');
    }
}
