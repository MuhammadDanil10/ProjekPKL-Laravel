<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VotingController extends Controller
{
    public function index()
    {
        $votings = Voting::all();
        
        return view('votings.index', compact('votings'));
    }

    public function create()
    {
        return view('votings.create');
    }

    public function vote(Request $request, Voting $voting)
    {
        
        $user = Auth::user();
        $newStatus = $voting->id;

        $cekUser = User::findOrFail($user->id);
        $cekUser->update(['status'=> $newStatus]);

        $voting->votes += 1;
        $voting->save();

        return redirect()->route('votings.endPage')->with('success', 'Voting berhasil.');
    }

    public function endPage()
    {
        return view('votings.endPage');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|image|max:2048',
            
        ]);


        $name = $request->file('photo')->getClientOriginalName();
    
        $request->photo->move('photos/',$name);

        // $voting = new Voting;
        // $voting->name = $request->name;
        // $voting->description = $request->description;
        // $voting->photo = $name;
        // $voting->save();
        // dd($request);

            
        Voting::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $name,
        ]);
    
        return redirect()->route('votings.index')->with('success', 'Voting created successfully.');
    }
    
  
    
        public function show($id)
        {
            $voting = Voting::findOrFail($id);
    
            return view('votings.show', compact('voting'));
        }

        

        public function showVote()
        {
            $votings = Voting::paginate(3);
        
            return view('admin.DataVoting', compact('votings'));
        }
        

        public function edit($id)
        {
            $voting = Voting::findOrFail($id);
            return view('admin.editVote', compact('voting'));
        }

    public function update(Request $request, $id)
    {
        $voting = Voting::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($voting->photo) {
                Storage::delete('photos/' . $voting->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $request->photo->move('photos/', $name);
            $voting->photo = $name;
        }

        $voting->name = $request->name;
        $voting->visi = $request->visi;
        $voting->misi = $request->misi;
        $voting->save();

        return redirect()->route('votings.index')->with('success', 'Voting updated successfully.');
    }
        
    

        
    
}
