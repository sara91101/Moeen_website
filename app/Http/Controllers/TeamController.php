<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data["teams"] = Team::select("*");

        if($request->input('member'))
        {
          $member = $request->input('member');

          Session(['member' => $member]);

          $data["teams"] = $data["teams"]->where(function($v) use ($member)
          {
              $v->where("ar_name",'LIKE', '%'. $member .'%')
              ->orWhere("en_name",'LIKE', '%'. $member .'%')
              ->orWhere("ar_job",'LIKE', '%'. $member .'%')
              ->orWhere("en_job",'LIKE', '%'. $member .'%');
          });
        }
        else
        {
          $membereSession = session('member');
          if( $membereSession != "")
          {
            $data["teams"] = $data["teams"]->where(function($v) use ($membereSession)
            {
                $v->where("ar_name",'LIKE', '%'. $membereSession .'%')
              ->orWhere("en_name",'LIKE', '%'. $membereSession .'%')
              ->orWhere("ar_job",'LIKE', '%'. $membereSession .'%')
              ->orWhere("en_job",'LIKE', '%'. $membereSession .'%');
            });
          }
        }

        $data["teams"] = $data["teams"]->paginate(15);

        return view("manage.teams",$data);
    }

    public function showAll()
    {
      Session(['member' => ""]);
      Session(['job' => ""]);

      return redirect("/team");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("manage.createTeam");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $member = new Team();
        $member->en_name = $request->en_name;
        $member->ar_name = $request->ar_name;
        $member->en_job = $request->en_job;
        $member->ar_job = $request->ar_job;

        if($request->file("image"))
        {
            $path = public_path('teamImages');

            $file = $request->file("image");
            $fileName = "team".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $member->image = $fileName;
        }
        $member->save();

        return redirect("/team")->with("note","تمت الاضافة");
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $member)
    {
        $data["member"] = Team::find($member);

        return view("manage.editTeam",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request,  $member_id)
    {
        $member = Team::find($member_id);
        $member->ar_name = $request->ar_name;
        $member->en_name = $request->en_name;
        $member->en_job = $request->en_job;
        $member->ar_job = $request->ar_job;

        $path = public_path('teamImages');

        if($request->file("image"))
        {
            $file = $request->file("image");
            $fileName = "team".time(). '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $member->image = $fileName;
        }

        $member->update();
        return redirect("/team")->with("note","تم التعديل");

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $member)
    {
        Team::where("id",$member)->delete();

        return redirect("/team")->with("note","تم الحذف");
    }
}
