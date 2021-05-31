<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Krs;
use App\Models\Kelas;
use App\Models\Mahasiswa;
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
        Krs::create([
            'kelas_id' => $request->kelas_id,
            'mahasiswa_id'=> $request->id_mhs
        ]);
        return redirect('kelas');
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
 
        $pert = DB::table('kelas')
        ->leftJoin('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
        ->where('kelas.id','=',$id)
        ->orderBy('pertemuan.pertemuan_ke')
        ->get([
            'pertemuan.pertemuan_ke','pertemuan.id AS pertemuan_id','kelas.id AS kelas_id']);

        $krs = DB::table('kelas')
        ->join('krs', 'krs.kelas_id', '=', 'kelas.id')
        ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('kelas.id', '=', $id)
        ->get([
            'mahasiswa.id AS mahasiswa_id','mahasiswa.nim','mahasiswa.nama'
        ]);

        foreach ($krs as $krs2) {
            $data[] = $krs2->mahasiswa_id;
        }
        
        $datamhs = DB::table('mahasiswa')
        ->whereNotIn('mahasiswa.id',$data)
        ->get(['mahasiswa.nama AS nama_mhs', 'mahasiswa.id AS id_mhs']);
        
        return view('Halaman.krs',compact('krs','kelas','pert','datamhs'));   
        // echo "<pre>";
        // print_r($mhs);
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
