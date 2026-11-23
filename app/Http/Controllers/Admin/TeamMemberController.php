<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.en' => 'required|string',
            'name.ar' => 'required|string',
            'designation.en' => 'required|string',
            'designation.ar' => 'required|string',
            'photo' => 'nullable|image|max:4096',
        ]);

        $photoPath = 'assets/images/team/team-1.png';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'team_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/team'), $filename);
            $photoPath = 'assets/images/team/' . $filename;
        }

        TeamMember::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'photo' => $photoPath,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'sort_order' => $request->sort_order ?: 0,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $request->validate([
            'name.en' => 'required|string',
            'name.ar' => 'required|string',
            'designation.en' => 'required|string',
            'designation.ar' => 'required|string',
            'photo' => 'nullable|image|max:4096',
        ]);

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'sort_order' => $request->sort_order ?: 0,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'team_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/team'), $filename);
            $data['photo'] = 'assets/images/team/' . $filename;
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully!');
    }
}
