<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table ='branches';
    protected $primaryKey = 'branch_id';
    protected $fillable = ['branch_name', 'branch_type','branch_location'];

    public function request()
    {
        return $this->hasMany('App\BloodRequest');
    }
}
