<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function download($file)
    {
        $filePath = public_path('UserData/' . $file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404);
        }
    }
}
