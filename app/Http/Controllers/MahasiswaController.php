<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $dtMahasiswa = Mahasiswa::all();
        return view('Halaman.mahasiswa', compact('dtMahasiswa'));
    }

    public function create()
    {
        return view('Halaman.create.c-mahasiswa');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $nim = $request->nim;
        $nim1 = DB::table('mahasiswa')->where('nim', '=', $nim)->get();
        $jml = count(collect($nim1));
        if ($jml > 0) {
            return redirect('tambah-mahasiswa')->with('error', 'Nim sudah pernah diinputkan');
        } else {
            Mahasiswa::create([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return redirect('mahasiswa')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
        }
    }

    public function show($mahasiswa_id)
    {

        $mahasiswa = Mahasiswa::find($mahasiswa_id);
        $kelas = DB::table('krs')
        ->rightJoin('kelas', 'krs.kelas_id', '=', 'kelas.id')
        ->rightJoin('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('mahasiswa.id', '=', $mahasiswa_id)
        ->get([
            'kelas.id','kelas.kode_kelas','krs.id AS krs_id'
        ]);
        return view('Mahasiswa.profil_mhs', compact('mahasiswa','kelas'));
    }

    public function showDetail($krs_id)
    {
        $kode = DB :: table ('krs')
        ->join('kelas','kelas.id', '=', 'krs.kelas_id')
        ->where('krs.id', '=', $krs_id)
        ->get(['kelas.kode_kelas','kelas.id','kelas.nama_matkul', 'kelas.semester',
                'kelas.tahun', 'kelas.sks' ]);
        foreach ($kode as $kode1) {
            $data[] = $kode1->kode_kelas;
        }
        $pert = DB :: table('pertemuan')
        ->join('kelas','pertemuan.kelas_id','=','kelas.id')
        ->where('kelas.kode_kelas','=',$data)
        ->orderBy('pertemuan.pertemuan_ke')
        ->get(['pertemuan.pertemuan_ke']);

        // $kelas = DB::table('absensi')
        // ->rightJoin('krs', 'absensi.krs_id', '=', 'krs.id')
        // ->rightJoin('kelas', 'kelas.id', '=', 'krs.kelas_id')
        // ->rightJoin('pertemuan', 'absensi.pertemuan_id', '=', 'pertemuan.id')
        // ->where('krs.id', '=', $krs_id)
        // ->get(['pertemuan.pertemuan_ke']);
    dd($pert);
        return view('Mahasiswa.detail-kls', compact('pert','kode'));
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::findorfail($id);
        return view('Halaman.edit.e-mahasiswa',compact('mhs'));
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findorfail($id);
        $mhs->update($request->all());

        return redirect('mahasiswa')->with('edit','Data Mahasiswa Berhasil Diedit');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::findorfail($id);
        $mhs->delete();
        return back()->with('delete','Data Mahasiswa Berhasil Dihapus');
    }
}
