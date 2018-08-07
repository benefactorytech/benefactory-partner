<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailPartner extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'email', 'website'
    ];

    public function users(){
        return $this->hasMany(User::class, 'retail_partners_id');
    }
}
