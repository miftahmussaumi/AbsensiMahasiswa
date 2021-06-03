<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class PertemuanController extends Controller
{
    public function create()
    {
        return view('Halaman.create.c-pert');
    }

    public function store(Request $request, $id)
    {
        $pert_ke = $request->pertemuan_ke;
        $ke = DB::table('kelas')
        ->join('pertemuan','pertemuan.kelas_id','=','kelas.id')
        ->where('pertemuan.pertemuan_ke', '=', $pert_ke)
        ->where('kelas.id','=',$id)
        ->get();

        $tgl=$request->tanggal;
        $year = date ('Y');
        $tahun = substr($tgl, 0, 4);

        $jml = count(collect($ke));
        if ($jml > 0 && $tahun = $year) {
            session()->flash('fail');
        } else {
            Pertemuan::create ([
                'kelas_id'=> $request->kelas_id,
                'pertemuan_ke' => $request->pertemuan_ke,
                'tanggal' => $request->tanggal,
                'materi' => $request->materi
            ]);
            session()->flash('success');
        }
        $kelas_id = Kelas::find($id);
        return view('Halaman.create.c-pert', compact('kelas_id'));
    }

    public function show($id)
    {
        $kelas_id = Kelas::find($id);
        return view('Halaman.create.c-pert',compact('kelas_id'));
    }

    public function showDetail($id)
    {
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
}
