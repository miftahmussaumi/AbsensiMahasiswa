<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pertemuan = Pertemuan::all();
        // return view('Halaman.pertemuan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Halaman.create.c-pert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Pertemuan::create ([
            'kelas_id'=> $request->kelas_id,
            'pertemuan_ke' => $request->pertemuan_ke,
            'tanggal' => $request->tanggal,
            'materi' => $request->materi
        ]);
        return redirect('detail');
        // return redirect('detail', '1');
        // return url('detail', '$kelas_id');
        // return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas_id = Kelas::find($id);
        return view('Halaman.create.c-pert',compact('kelas_id'));
    }

    public function showDetail($id)
    {
        $pert = DB::table('kelas')
        ->join('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
        ->where('pertemuan.id', '=', $id)
        ->get([
            'pertemuan.pertemuan_ke', 'pertemuan.id AS pertemuan_id', 'pertemuan.tanggal',
            'pertemuan.materi', 'kelas.id AS kelas_id','kelas.kode_kelas','kelas.kode_matkul',
            'kelas.nama_matkul','kelas.tahun','kelas.semester','kelas.sks'
        ]);
        return view('Halaman.pertemuan', compact('pert')); 
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
