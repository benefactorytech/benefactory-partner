<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
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
        $retailer_url = 'http://benefactory.dev/v1/retailers/' . $user->retail_partners_id;
        $retailer_details = json_decode(file_get_contents($retailer_url));
        //return file_get_contents($url);

        $contribution_log_url = $retailer_url . '/contributionlog';
        $recent_contribution_log = json_decode(file_get_contents($contribution_log_url));
        //return file_get_contents($contribution_log_url);

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
        //return $data;
        return view('dashboard')->with($data);
    }

    public function loginlayout(){
        return view('designs.login');
    }

    public function dashboardlayout(){
        return view('designs.dashboard');
    }
}
