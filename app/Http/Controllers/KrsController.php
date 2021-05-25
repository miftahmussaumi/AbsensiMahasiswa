<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Krs;
use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Halaman.krs'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->Krs= new Krs();
    }

    public function show($id)
    {
        $kelas = Kelas::find($id);
        $krs = DB::table('kelas')
        ->join('krs', 'krs.kelas_id', '=', 'kelas.id')
        ->rightJoin('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('kelas.id', '=', $id)
        ->get([
            'mahasiswa.nama', 'mahasiswa.nim',
        ]);
        $pert = DB::table('kelas')
        ->join('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
        ->where('kelas.id','=',$id)
        ->get([
            'pertemuan.pertemuan_ke', 'pertemuan.tanggal', 'pertemuan.materi']);
        // echo "<pre>";
        // print_r($krs);
        // $data = [
        //     'krs'=> $this->Krs->allData(),
        // ];
        return view('Halaman.krs',compact('krs','kelas','pert'));   
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
