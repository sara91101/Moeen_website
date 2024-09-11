<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data["services"] = Service::select("services.*");

        if($request->input('service'))
        {
          $service = $request->input('service');

          Session(['service' => $service]);

          $data["services"] = $data["services"]->where(function($v) use ($service)
          {
              $v->where("service_ar",'LIKE', '%'. $service .'%')
              ->orWhere("service_en",'LIKE', '%'. $service .'%');
          });
        }
        else
        {
          $serviceSession = session('service');
          if( $serviceSession != "")
          {
            $data["services"] = $data["services"]->where(function($v) use ($serviceSession)
            {
                $v->where("service_ar",'LIKE', '%'. $serviceSession .'%')
              ->orWhere("service_en",'LIKE', '%'. $serviceSession .'%');
            });
          }
        }

        $data["services"] = $data["services"]->orderBy('service_ar')->paginate(15);


        return view("manage.services",$data);
    }

    public function showAll()
    {
      Session(['service' => ""]);

      return redirect("/services");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("manage.createService");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();

        $service->service_ar = $request->service_ar;
        $service->service_en = $request->service_en;
        $service->icon = $request->icon;

        $service->save();

        return redirect("/services")->with("note","تمت الاضافة");

    }

    /**
     * Display the specified resource.
     */
    public function show( $service)
    {
        $data["service"] = Service::find($service);

        return view("manage.service",$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $service)
    {
        $data["service"] = Service::find($service);

        return view("manage.editService",$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request,$service_id)
    {
        $service = Service::find($service_id);

        $service->service_ar = $request->service_ar;
        $service->service_en = $request->service_en;
        $service->icon = $request->icon;
        $service->update();

        return redirect("/services")->with("note","تم التعديل");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $service)
    {
        Service::where("id",$service)->delete();
        return redirect("/services")->with("note","تم الحذف");
    }
}
