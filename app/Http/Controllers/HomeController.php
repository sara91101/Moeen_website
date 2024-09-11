<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data["contacts"] = Contact::orderBy("id","DESC")->limit(10)->get();
        return view('manage.home',$data);
    }

    public function change_password(Request $request)
    {
        User::where("id", Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);

        Session::flush();

        return redirect("/");
    }
}
