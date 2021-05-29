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
    public function store(Request $request, $id)
    {
        // dd($request->all());
        Pertemuan::create ([
            'kelas_id'=> $request->kelas_id,
            'pertemuan_ke' => $request->pertemuan_ke,
            'tanggal' => $request->tanggal,
            'materi' => $request->materi
        ]);
        $kelas_id = Kelas::find($id);
        return view('Halaman.create.c-pert', compact('kelas_id'));
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
        // SELECT mahasiswa.nim,mahasiswa.nama,absensi.jam_masuk,absensi.jam_keluar,absensi.durasi, 
        // kelas.kode_kelas,pertemuan.pertemuan_ke,pertemuan.tanggal FROM absensi RIGHT JOIN krs 
        // ON krs.id=absensi.krs_id RIGHT JOIN pertemuan ON pertemuan.id=absensi.pertemuan_id RIGHT JOIN mahasiswa 
        // ON mahasiswa.id=krs.mahasiswa_id RIGHT JOIN kelas ON kelas.id=krs.kelas_id WHERE pertemuan.pertemuan_ke='1'
        
        $pert = DB::table('absensi')
        ->rightJoin('krs', 'krs.id', '=', 'absensi.krs_id')
        ->rightJoin('pertemuan', 'pertemuan.id', '=', 'absensi.pertemuan_id')
        ->rightJoin('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->rightJoin('kelas', 'kelas.id', '=', 'krs.kelas_id')
        ->where('pertemuan.id', '=', $id)
        ->get([
            'mahasiswa.nim', 'mahasiswa.nama', 'absensi.jam_masuk', 'absensi.jam_keluar',
            'absensi.durasi', 'kelas.kode_kelas', 'kelas.kode_matkul', 'kelas.nama_matkul',
            'kelas.tahun','kelas.semester','kelas.sks','pertemuan.pertemuan_ke', 
            'pertemuan.id AS pertemuan_id', 'pertemuan.tanggal', 'absensi.id AS absensi_id',
            'pertemuan.materi', 'kelas.id AS kelas_id', 'krs.id AS krs_id'
            ]);

        $kls = DB::table('kelas')
        ->rightJoin('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
        ->where('pertemuan.id', '=', $id)
        ->get([
            'kelas.kode_kelas', 'kelas.kode_matkul', 'kelas.nama_matkul',
            'kelas.tahun', 'kelas.semester', 'kelas.sks', 'pertemuan.pertemuan_ke',
            'pertemuan.id AS pertemuan_id', 'pertemuan.tanggal',
            'pertemuan.materi', 'kelas.id AS kelas_id'
        ]);
        
        return view('Halaman.pertemuan', compact('pert','kls')); 
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
