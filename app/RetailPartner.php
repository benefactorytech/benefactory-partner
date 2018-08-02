<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailPartner extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'email', 'website'
    ];
}
