<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $voting = Voting::all();
        $status = User::all();
        return view('admin.admin',compact('voting','status'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function users()
    {
        return view('admin.users');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'photo' => 'required|image|max:2048',
            'umur' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
            'jabatan_lama' => 'required',
            'motivasi' => 'required',
        ]);
    
        $name = $request->file('photo')->getClientOriginalName();
        $request->photo->move('photos/', $name);
    
        Voting::create([
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'photo' => $name,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'hobi' => $request->hobi,
            'jabatan_lama' => $request->jabatan_lama,
            'motivasi' => $request->motivasi,
        ]);
    
        return redirect()->route('admin.create')->with('success', 'Voting created successfully.');
    }
    

    
    public function show()
    {
    $user = User::paginate(10);

    return view('admin.user', compact('user'));
     }

     public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|numeric|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nisn = $request->nisn;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User registered successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'password' => 'nullable|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nisn = $request->nisn;
        $user->save();

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function exportPdf()
    {
        $data = User::where('status',0)->get();

        view()->share('data', $data);
        $pdf = PDF::loadView('data-belum-memilih');
        return $pdf->download('datagolput.pdf');
    }

    public function exportPdfp()
    {
        $allowedStatuses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $data = User::whereIn('status', $allowedStatuses)->get();


        view()->share('data', $data);
        $pdf = PDF::loadView('data-sudah-memilih');
        return $pdf->download('datapemilih.pdf');
    }

      public function export($status, $votingId)
    {
        $data = User::where('status', $status)->get();
        // Lakukan logika lainnya sesuai kebutuhan Anda, misalnya filter berdasarkan votingId

        // Bagian untuk menghasilkan dan mengunduh file PDF
        $pdf = PDF::loadView('export-data', ['data' => $data]);
        return $pdf->download('data.pdf');
    }
    
    
    public function memilih()
    {
        $allowedStatuses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $data = User::whereIn('status', $allowedStatuses)->paginate(10);

        return view('admin.memilih',compact('data'));
    }

    public function golput()
    {
        $data = User::where('status',0)->paginate(10);

        return view('admin.golput',compact('data'));
    }

    


    // public function showData(Request $request, $status)
    // {
    //     $data = User::where('status', $status)->get();

    //     return view('admin.table', compact('data'));
    // }

    public function showData(Request $request, $votingId)
    {
        $voting = Voting::find($votingId);
        $data = User::where('status', $votingId)->get();
        return view('admin.table', compact('data', 'voting'));
    }

    public function importExcel(Request $request)
    {
        $data = $request->file('file');

        $namaFile = $data->getClientOriginalName();
        $data->move('UserData', $namaFile);

        Excel::import(new UserImport, \public_path('/UserData/'.$namaFile));
        return redirect()->back();
    }

    public function exportExcel()
    {
        return Excel::download(new UserExport, 'DataPemilih.xlsx');
    }



}
