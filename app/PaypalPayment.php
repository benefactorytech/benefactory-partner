<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $fillable = [
        'amount', 'user_id', 'payment_token', 'order_id', 'payer_id', 'payment_id'
    ];

    public function user(){
        //
    }
}
