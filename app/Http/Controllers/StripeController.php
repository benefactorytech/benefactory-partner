<?php

namespace App\Http\Controllers;

use App\UserInformationStatus;
use Illuminate\Http\Request;

class StripeController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view("admin.payment.stripe.ach.index");
    }

    public function configure(Request $request){
        //return $request->all();
        //$amount = $request->amount;

        \Stripe\Stripe::setApiKey("sk_test_HuUf0P92AbtUOXRdMaAOvqI8");
        
        $customer = \Stripe\Customer::create([
        "source" => $request->stripeToken,
        "description" => "Example customer"
        ]);

        $customer_id = $customer->id;
        $bank_id = $customer->default_source;

        // get the existing bank account
        $customer = \Stripe\Customer::retrieve($customer_id);
        $bank_account = $customer->sources->retrieve($bank_id);

        // verify the account
        $bank_account->verify(['amounts' => [32, 45]]);

        $charge = \Stripe\Charge::create([
            "amount" => 1000,
            "currency" => "usd",
            "customer" => $customer_id // Previously stored, then retrieved
          ]);

        //return $charge;

        if ($charge->outcome->seller_message == "Payment complete."){
            return redirect(url("/admin/payment/do/ach/complete?success=true"));
        }else{
            return redirect(url("/admin/payment/do/ach/complete?success=false"));
        }
    }

    public function complete(Request $request){
        if($request->success == "true"){
            return redirect(url("/admin/payment/do/thankyou"));
        }
        return redirect(url("/admin/payment/do/error"));
    }
}
