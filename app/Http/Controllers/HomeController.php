<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $retailer_url = 'https://ttdev.benefactory.in/v1/retailers/';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user = auth()->user();
        $retailer_url = $this->retailer_url . $user->retail_partners_id;
        $retailer_details = json_decode(file_get_contents($retailer_url));

        $contribution_log_url = $retailer_url . '/contributionlog';
        $recent_contribution_log = json_decode(file_get_contents($contribution_log_url));

        $data = array(
            "name" => $retailer_details->name,
            "logo" => $retailer_details->logo,
            "contact_person" => $retailer_details->contact_person,
            "contact_email" => $retailer_details->email,
            "website" => $retailer_details->website,
            "contribution_log" => array(
                "contribution_log" => $recent_contribution_log,
            ),
        );
        return view('dashboard')->with($data);
    }

    public function cardPayment(){
        $user = auth()->user();
        $retailer_url = $this->retailer_url . $user->retail_partners_id;
        $retailer_details = json_decode(file_get_contents($retailer_url));
        $data = array(
            "name" => $retailer_details->name,
            "logo" => $retailer_details->logo,
            "contact_person" => $retailer_details->contact_person,
            "contact_email" => $retailer_details->email,
            "website" => $retailer_details->website,
        );

        return view('stripe.cardpayment')->with($data);
    }

    public function loginlayout(){
        return view('designs.login');
    }

    public function dashboardlayout(){
        return view('designs.dashboard');
    }
}
