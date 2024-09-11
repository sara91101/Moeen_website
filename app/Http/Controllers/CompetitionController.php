<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["competitions"] = Competition::all();

        return view("manage.competitions",$data);
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
    public function store(Request $request)
    {
        $competition = new Competition();

        $path = public_path('our_competitions');

        $file = $request->file("logo");
        $fileName = "competition_logo_".time(). '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);

        $competition->logo = "/our_competitions/".$fileName;

        $competition->save();

        return redirect("/competitions")->with("note","تمت الإضافة");
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $competition)
    {
        Competition::where('id',$competition)->delete();

        return redirect("/competitions")->with("note","تم الحذف");

    }
}
