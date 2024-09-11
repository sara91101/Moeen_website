<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Customer;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{

    public function changeLanguage($language,Request $request)
    {
        App::setLocale($language);
        session()->put('locale', $language);

        return redirect($_COOKIE['url']);
    }


    public function website()
    {
        $data["introduction"] = Home::where("home_type","Introduction")->first();
        $data["about"] = Home::where("home_type","About")->first();

        $data["vision"] = Home::where("home_type","Vision")->first();
        $data["mission"] = Home::where("home_type","Mission")->first();

        $data["goals"] = Home::where("home_type","Goal")->get();
        $data["results"] = Home::where("home_type","Result")->get();

        $data["customers"] = Customer::all();
        $data["partners"] = Partner::all();

        $data["services"] = Service::all();
        $data["motivators"] = Home::where("home_type","Motivator")->get();

        $data["address"] = Home::where("home_type","Address")->first();
        $data["phones"] = Home::where("home_type","Phone")->get();
        $data["email"] = Home::where("home_type","Email")->first();

        $data["team"] = Team::all();

        $data["competitions"] = Competition::all();

        $data["colors"] = ['#0dcaf0','#fd7e14','#20c997','#df1529','#6610f2','#f3268c'];

        return view("welcome",$data);
    }
}
