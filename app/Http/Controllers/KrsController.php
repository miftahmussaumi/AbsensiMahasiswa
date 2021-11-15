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

    public function index()
    {
        return view('Halaman.krs'); 
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        Krs::create([
            'kelas`_id' => $request->kelas_id,
            'mahasiswa_id'=> $request->id_mhs
        ]);
        return back()->with('success', 'Mahasiswa berhasil ditambahkan !');
    }


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
            'mahasiswa.id AS mahasiswa_id','mahasiswa.nim','mahasiswa.nama','krs.id AS krs_id'
        ]);

        $jml = count(collect($krs));
        if($jml >  0) {
            foreach ($krs as $krs2) {
                $data[] = $krs2->mahasiswa_id;
            }
            $datamhs = DB::table('mahasiswa')
            ->whereNotIn('mahasiswa.id',$data)
            ->get(['mahasiswa.nama AS nama_mhs', 'mahasiswa.id AS id_mhs']);
            return view('Halaman.krs', compact('krs', 'kelas', 'pert', 'datamhs'));  
        } else {
            $datamhs = DB::table('mahasiswa')
                ->get(['mahasiswa.nama AS nama_mhs', 'mahasiswa.id AS id_mhs']);
            return view('Halaman.krs', compact('krs', 'kelas', 'pert', 'datamhs'));  
        } 
    }

    public function destroy($krs_id)
    {
        $krs = Krs::findorfail($krs_id);
        $krs->delete();
        return back()->with('delete', 'Mahasiswa Berhasil Dihapus');
    }
}
