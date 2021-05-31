<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('Halaman.import');
    }

    
    public function store(Request $request)
    {
        $upload=$request->file('file');
        $filePath=$upload->getRealPath();
        $file=fopen($filePath,'r');
        $skipLines = 7;
        $lineNum = 1;
        while (fgetcsv($file)) {
            if ($lineNum > $skipLines) {
                break;
            }
            $lineNum++;
        }
        $header= fgetcsv($file , "\t");
        dd($header);
    }
}
