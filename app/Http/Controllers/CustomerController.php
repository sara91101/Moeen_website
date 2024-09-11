<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data["customers"] = Customer::select("*");

        if($request->input('customer'))
        {
          $customer = $request->input('customer');

          Session(['customer' => $customer]);

          $data["customers"] = $data["customers"]->where(function($v) use ($customer)
          {
              $v->where("ar_name",'LIKE', '%'. $customer .'%')
              ->orWhere("en_name",'LIKE', '%'. $customer .'%');
          });
        }
        else
        {
          $customerSession = session('customer');
          if( $customerSession != "")
          {
            $data["customers"] = $data["customers"]->where(function($v) use ($customerSession)
            {
                $v->where("ar_name",'LIKE', '%'. $customerSession .'%')
              ->orWhere("en_name",'LIKE', '%'. $customerSession .'%');
            });
          }
        }

        $data["customers"] = $data["customers"]->orderBy('ar_name')->paginate(15);


        return view("manage.customers",$data);
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
    public function store(CustomerRequest $request)
    {
        $customer = new customer();
        $customer->ar_name = $request->ar_name;
        $customer->en_name = $request->en_name;

        $path = public_path('ourCustomers');

        if($request->file("logo"))
        {
            $file = $request->file("logo");
            $fileName = "customer_logo_".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $customer->logo = "/ourCustomers/".$fileName;
        }
        $customer->save();

        return redirect("/customers")->with("note","تمت الإضافة");

    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $customer =  Customer::find($request->customer_id);
        $customer->ar_name = $request->ar_name;
        $customer->en_name = $request->en_name;

        $path = public_path('ourCustomers');

        if($request->file("logo"))
        {
            File::delete($customer->logo);
            $file = $request->file("logo");
            $fileName = "customer_logo_".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $customer->logo = "/ourCustomers/".$fileName;
        }
        $customer->update();
        return redirect("/customers")->with("note","تم التعديل");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $customer)
    {
        $customer =  Customer::find($customer);
        File::delete($customer->logo);
        $customer->delete();
        return redirect("/customers")->with("note","تم الحذف");
    }
}
