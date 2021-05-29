<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKelas = Kelas::all();
        return view('Halaman.kelas',compact('dtKelas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Halaman.create.c-kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas_kode = $request->kode_kelas;
        $kls = DB::table('kelas') -> where('kode_kelas','=',$kelas_kode)->get();
        $jml = count(collect($kls));
        // echo "<pre>";
        // print_r($jml);
        if($jml > 0){
            session()->flash('fail');
        } else {
            Kelas::create([
                'kode_kelas' => $request->kode_kelas,
                'kode_matkul' => $request->kode_matkul,
                'nama_matkul' => $request->nama_matkul,
                'tahun' => $request->tahun,
                'semester' => $request->semester,
                'sks' => $request->sks
            ]);
            session()->flash('success');
        }
        return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
