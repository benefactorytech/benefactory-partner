<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformationStatus;

class CustomerTransactionLogController extends Controller
{
    protected $retailer_url = 'https://ttdev.benefactory.in/v1/retailers/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        $url = $this->retailer_url . $userInformationStatus->retailers_id;
        $retailer_details = json_decode(file_get_contents($url));
        $contribution_log_url = $url . '/contributionlog';
        $recent_contribution_log = json_decode(file_get_contents($contribution_log_url . '?page=' . $request->page));
        
        $data = array(
            "name" => $retailer_details->name,
            "logo" => $retailer_details->logo,
            "contact_person" => $retailer_details->contact_person,
            "contact_email" => $retailer_details->email,
            "website" => $retailer_details->website,
            "contribution_log" => $recent_contribution_log,
        );
        return view("admin.customerTransactionLog.index")->with($data);
    }
}
