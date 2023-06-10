<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voting;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ChartController extends Controller
{
    public function pieChart()
    {
        
        $votings = Voting::all();   
        $users = User::all();
        return view('admin.admin',compact('votings','users'));
    }

    public function pieChartt()
    {
        
        $votings = Voting::all();   
        $users = User::all();
        return view('welcome',compact('votings','users'));
    }


    public function export($votingId)
    {
            $voting = Voting::findOrFail($votingId);
            $data = User::where('status', $voting->id)->get();

            view()->share('data', $data);
            $pdf = PDF::loadView('data-sudah-memilih');
            return $pdf->download('datapemilih' . $voting->name . '.pdf');

    }

    

}
