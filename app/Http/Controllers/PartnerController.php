<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data["partners"] = Partner::select("*");

        if($request->input('partner'))
        {
          $partner = $request->input('partner');

          Session(['partner' => $partner]);

          $data["partners"] = $data["partners"]->where(function($v) use ($partner)
          {
              $v->where("ar_name",'LIKE', '%'. $partner .'%')
              ->orWhere("en_name",'LIKE', '%'. $partner .'%');
          });
        }
        else
        {
          $partnerSession = session('partner');
          if( $partnerSession != "")
          {
            $data["partners"] = $data["partners"]->where(function($v) use ($partnerSession)
            {
                $v->where("ar_name",'LIKE', '%'. $partnerSession .'%')
              ->orWhere("en_name",'LIKE', '%'. $partnerSession .'%');
            });
          }
        }

        $data["partners"] = $data["partners"]->orderBy('ar_name')->paginate(15);


        return view("manage.partners",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $partner = new Partner();
        $partner->ar_name = $request->ar_name;
        $partner->en_name = $request->en_name;

        $path = public_path('ourPartners');

        if($request->file("logo"))
        {
            $file = $request->file("logo");
            $fileName = "partner_logo_".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $partner->logo = "/ourPartners/".$fileName;
        }
        $partner->save();

        return redirect("/partners")->with("note","تمت الإضافة");

    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $partner =  Partner::find($request->partner_id);
        $partner->ar_name = $request->ar_name;
        $partner->en_name = $request->en_name;

        $path = public_path('ourPartners');

        if($request->file("logo"))
        {
            File::delete($partner->logo);
            $file = $request->file("logo");
            $fileName = "partner_logo_".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $partner->logo = "/ourPartners/".$fileName;
        }
        $partner->update();
        return redirect("/partners")->with("note","تم التعديل");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $partner)
    {
        $partner =  Partner::find($partner);
        File::delete($partner->logo);
        $partner->delete();
        return redirect("/partners")->with("note","تم الحذف");
    }
}
