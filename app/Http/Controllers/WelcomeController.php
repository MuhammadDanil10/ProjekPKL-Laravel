<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        
        $votings = Voting::all();   
        $users = User::all();
        return view('welcome',compact('votings','users'));
    }

    public function show()
    {
        $users =User::all();

        return view('welcome',compact('users'));
    }
}
