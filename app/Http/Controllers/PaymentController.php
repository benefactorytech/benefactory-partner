<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformationStatus;

class PaymentController extends Controller
{
    protected $retailer_url = 'https://ttdev.benefactory.in/v1/retailers/';

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        $retailer_url = $this->retailer_url . $userInformationStatus->retailers_id;
        $retailer_details = json_decode(file_get_contents($retailer_url));

        $contribution_log_url = $retailer_url . '/contributionlog';
        $recent_contribution_log = json_decode(file_get_contents($contribution_log_url . '?page=' . $request->page));

        $contributions = 0;

        $all_contributions = $contribution_log_url . '/all';
        $all_contributions = json_decode(file_get_contents($all_contributions));

        foreach($all_contributions as $contribution){
            $contributions += $contribution->amount;
        }

        //return (array)$recent_contribution_log;
        $data = array(
            "name" => $retailer_details->name,
            "logo" => $retailer_details->logo,
            "contact_person" => $retailer_details->contact_person,
            "contact_email" => $retailer_details->email,
            "website" => $retailer_details->website,
            "donation_amount" => $retailer_details->donation_amount,
            "contribution_log" => $recent_contribution_log,
            "total_contributions" => $recent_contribution_log->total,
            "total_amount" => $contributions,
        );
        return view("admin.payment.index")->with($data);
    }

    public function chooseGateway(){
        $cid = auth()->user()->countries_id;
        if($cid == 215){
            //ACH payment gateway
            return redirect("/admin/payment/do/ach");
        }else{
            //PayPal gateway
            return redirect("/admin/payment/do/gateway");
        }
    }
    
    private function getLifetimeContribution($data){}

    public function thankyou(Request $request){
        return view("admin.payment.thankyou");
    }

    public function error(Request $request){
        return view("admin.payment.error");
    }
}
