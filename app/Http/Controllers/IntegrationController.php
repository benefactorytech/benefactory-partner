<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformationStatus;

class IntegrationController extends Controller
{
    protected $retailer_url = 'https://ttdev.benefactory.in/v1/retailers/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        $retailer_url = $this->retailer_url . $userInformationStatus->retailers_id;
        $retailer_details = json_decode(file_get_contents($retailer_url));

        $data = array(
            "name" => $retailer_details->name,
            "logo" => $retailer_details->logo,
            "contact_person" => $retailer_details->contact_person,
            "contact_email" => $retailer_details->email,
            "website" => $retailer_details->website,
        );

        return view("admin.integrations.index")->with($data);
    }
}
