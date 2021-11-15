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

        $jml = count(collect($ke));
        if ($jml > 0) {
            session()->flash('fail');
        } else {
            Pertemuan::create ([
                'kelas_id'=> $request->kelas_id,
                'pertemuan_ke' => $request->pertemuan_ke,
                'tanggal' => $request->tanggal,
                'materi' => $request->materi
            ]);
            session()->flash('berhasil');
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
        //Ambil data kehadiran Mahasiswa [Absensi]
        $pert = DB::table('absensi')
        ->rightJoin('krs', 'krs.id', '=', 'absensi.krs_id')
        ->rightJoin('pertemuan', 'pertemuan.id', '=', 'absensi.pertemuan_id')
        ->rightJoin('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('pertemuan.id', '=', $id)
        ->get([
            'mahasiswa.nim', 'mahasiswa.nama', 'absensi.jam_masuk', 
            'absensi.jam_keluar','absensi.durasi'
        ]);

        //Ambil data kelas[Kelas]
        $kls = DB::table('kelas')
        ->rightJoin('pertemuan', 'pertemuan.kelas_id', '=', 'kelas.id')
        ->where('pertemuan.id', '=', $id)
        ->get([
            'kelas.kode_kelas', 'kelas.kode_matkul', 'kelas.nama_matkul',
            'kelas.tahun', 'kelas.semester', 'kelas.sks', 'pertemuan.pertemuan_ke',
            'pertemuan.id AS pertemuan_id', 'pertemuan.tanggal',
            'pertemuan.materi', 'kelas.id AS kelas_id'
        ]);

        foreach ($kls as $dt_kls) {
            $ambil[] = $dt_kls->kelas_id;
        }

        foreach ($pert as $dt_pert) {
            $ambil[] = $dt_pert->nim;
        }
        //Ambil data mahasiswa yang tidak
        $krs = DB::table('kelas')
        ->join('krs', 'krs.kelas_id', '=', 'kelas.id')
        ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('kelas.id', '=', $ambil)
        ->whereNotIn('mahasiswa.nim',$ambil)
        ->get([
            'mahasiswa.id AS mahasiswa_id', 'mahasiswa.nim', 'mahasiswa.nama', 'krs.id AS krs_id'
        ]);
    
        return view('Halaman.pertemuan', compact('pert','kls','krs')); 
    }
}
