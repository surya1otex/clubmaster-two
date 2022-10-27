<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Registation_details extends Model
{

    
    protected $fillable = [
        'applicant_name', 'email_id', 'mobile_no', 'gender', 'dob', 'image_path', 'club_id', 'sports_id'
    ];

    public function club() {
        return $this->belongsTo(Club_master::class, 'club_id');
    }

    public function sports() {
        return $this->belongsTo(Sports_master::class, 'sports_id');
    }

    public function age()
      {
       return Carbon::parse($this->attributes['dob'])->dob;
     }
}
