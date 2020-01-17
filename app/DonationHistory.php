<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationHistory extends Model
{
    protected $table = "donation_history";
    protected $attributes = ['history_id,record_id,blood_quantityInPints,date_of_donation,donor_id,branch_id'];
    protected $primaryKey = 'history_id';
}
