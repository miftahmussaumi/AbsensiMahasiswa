<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $kls = DB::table('kelas')->get();
        $jml_kls = count(collect($kls));
        $mhs = DB::table('mahasiswa')->get();
        $jml_mhs = count(collect($mhs));
        $user = DB::table('users')->get();
        $jml_user = count(collect($user));

        return view('Halaman.beranda', compact('jml_kls','jml_mhs','jml_user'));
    }

    public function indexmhs()
    {
        return view('Halaman.beranda-mhs');
    }
}
