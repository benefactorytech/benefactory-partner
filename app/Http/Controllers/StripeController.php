<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\Stripe;
use \Stripe\Charge;

class StripeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function charge(Request $request){
        
        Stripe::setApiKey('sk_test_HuUf0P92AbtUOXRdMaAOvqI8');
        $charge = Charge::create([
            'amount' => 999,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $request['stripeToken'],
        ]);
        return $charge;
    }
}
