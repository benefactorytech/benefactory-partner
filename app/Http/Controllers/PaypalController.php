<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaypalPayment;
use Validator;

class PaypalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'amount' => 10,
        ];
        return view("admin.payment.paypal.index")->with($data);
    }

    /*
    |   Save the payment details if the payment was successful
    */
    public function paid(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'paymentToken' => 'required',
            'orderID' => 'required',
            'payerID' => 'required',
            'paymentID' => 'required'
        ]);

        if($validator->fails()){
            return redirect("/admin/payment/errors")
            ->withErrors($validator);
        }
        
        $paypal_payment = new PaypalPayment();
        $paypal_payment->amount = $request->amount;
        $paypal_payment->user_id = auth()->user()->id;
        $paypal_payment->payment_token = $reqeust->paymentToken;
        $paypal_payment->order_id = $request->orderID;
        $paypal_payment->payer_id = $request->payerID;
        $paypal_payment->payment_id = $request->paymentID;
        $paypal_payment->save();

        return redirect("/admin/payment/do/gateway/history");
    }

    /*
    |   Retrieve all the recent payments
    */
    public function paymentHistory(Request $request){
        $data = [
            'payments' => PaypalPayment::where('user_id', auth()->user()->id)->get(),
        ];
        return $data;
        return view("admin.payment.history.index")->with($data);
    }
}
