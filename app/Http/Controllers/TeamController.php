<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.team.index", ['teams' => Team::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.team.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:teams",
            "designation" => "required",
            "image" => "required|image|mimes:jpeg,jpg,png,gif,webp",
            "facebook_link" => "nullable|url",
            "linkedin_link" => "nullable|url",
        ]);

        Team::newTeam($request);
        return back()->with("msg", "Team Member Added Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view("admin.team.show", ["team" => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view("admin.team.edit", ["team" => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            "name" => "required",
            "designation" => "required",
            "image" => "image|mimes:jpeg,jpg,png,gif,webp",
            "facebook_link" => "nullable|url",
            "linkedin_link" => "nullable|url",
        ]);

        Team::updateTeam($request, $team);
        return to_route('team.index')->with("msg", "Team Member Updated Successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Team::deleteTeam($team);
        return back()->with("del", "Team Member Deleted Successfully!!");
    }
}
