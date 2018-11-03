<?php

namespace App\Http\Controllers;
use App\UserInformationStatus;
use Illuminate\Http\Request;
use App\Country;

class AdminController extends Controller
{
    protected $retailer_url = 'https://ttdev.benefactory.in/v1/retailers/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        if($userInformationStatus->agreement == 0){
            $country_id = auth()->user()->countries_id;
            return redirect('/userinformation/' . $country_id . '/agreement');
        }
        if($userInformationStatus->retailers_id === null){
            //load view to accept data
            return redirect('/userinformation/create');
        }
        
        $retailer_url = $this->retailer_url . $userInformationStatus->retailers_id;
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
        //return $data;
        return view('admin.dashboard')->with($data);
    }

    public function agreement($country_id){
        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        if($userInformationStatus->agreement != 0){
            return redirect('/dashboard');
        }

        $agreement_path = "/contracts/agreements/$country_id/agreement.pdf";
        $data = array(
            'username' => auth()->user()->name,
            'date' => date("d/m/Y"),
            'agreement_path' => $agreement_path
        );
        return view('admin.agreement')->with($data);
    }

    public function acceptedAgreement(Request $request, $country_id){
        if($request['agreed_agreement'] == 1.){
            $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
            $userInformationStatus->agreement = date("d/m/Y");
            $userInformationStatus->save();
        }
        return $this->dashboard();
    }

    public function create(){
        $url = "https://ttdev.benefactory.in";
        $data = array(
            'industries' => json_decode(file_get_contents($url . "/v1/industries")),
            'causes' => json_decode(file_get_contents($url . "/v1/causes")),
        );
        return view('admin.create')->with($data);
    }

    /*
    |   Interface between the actual database and the Retailer dashboard
    |   Validate the data so that it matches the contraints on the original website
    |   Image will be stored as .tmp and the file type is pre-defined
    |   Use that file to get contents and convert to base64
    |   Once done for logo, intro_image and banner, post the data using CURL
    */
    public function registerRetailer(Request $request){
        $domain_name = substr($request->website, 7);
        $slug = strtolower(str_replace(" ", "_", $request->organization_name));

        //logo and intro image
        $path = $request->file("logo");
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/tmp;base64,' . base64_encode($data);

        //banner
        $path = $request->file("banner");
        $data = file_get_contents($path);
        $banner = 'data:image/tmp;base64,' . base64_encode($data);

        $data_to_post = [
            'name' => $request->organization_name,
            'logo' => $logo,
            'intro_image' => $logo,
            'banner' => $banner,
            'contact_person' => $request->first_name . ' ' . $request->last_name,
            'contact_number' => $request->mobile,
            'email' => $request->email,
            'slug' => $slug,
            'client_id' => "1",
            'donation_amount' => $request->donation_amount,
            'website' => $request->website,
            'introduction' => $request->introduction,
            'domains' => "[{ 'domain_name': '$domain_name' }]",
            'industry_id' => $request->industry,
            'cause_id' => $request->cause,
            'status' => $request->status,
            'save_action' => 'save_and_back'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://ttdev.benefactory.in/v1/retailers/register");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_to_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);
        
        $result = json_decode($response, true);
        $retailer_id = $result['retailer_id'];

        $userInformationStatus = UserInformationStatus::where('users_id', auth()->user()->id)->get()->first();
        $userInformationStatus->retailers_id = $retailer_id;
        $userInformationStatus->save();

        return redirect('/dashboard');
    }
}
