<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformationStatus extends Model
{
    protected $fillable = [
        'users_id', 'retailers_id', 'agreement', 'poa', 'verified'
    ];

    /*
    public function belongsTo(){
        return $this->belongsTo('App\User');
    }
    */
}
