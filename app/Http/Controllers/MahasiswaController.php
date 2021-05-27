<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtMahasiswa = Mahasiswa::all();
        return view('Halaman.mahasiswa', compact('dtMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Halaman.create.c-mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mahasiswa_id)
    {
        // echo "<pre>";
        // print_r($mahasiswa_id);
        // SELECT krs.id,kelas.kode_kelas,kelas.nama_matkul,mahasiswa.nama,mahasiswa.nim FROM krs RIGHT JOIN kelas 
        // ON kelas.id=krs.kelas_id RIGHT JOIN mahasiswa ON mahasiswa.id=krs.mahasiswa_id WHERE mahasiswa.id='1'

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
        $kelas = DB::table('krs')
            ->rightJoin('absensi', 'absensi.krs_id', '=', 'krs.id')
            ->rightJoin('kelas', 'kelas.id', '=', 'krs.kelas_id')
            ->rightJoin('pertemuan', 'absensi.pertemuan_id', '=', 'pertemuan.id')
            ->where('krs.id', '=', $krs_id)
            ->get([
                'kelas.id', 'kelas.kode_kelas',
                'kelas.nama_matkul',
                'kelas.kode_matkul', 'kelas.semester',
                'kelas.tahun', 'kelas.sks', 'pertemuan.pertemuan_ke',
                'absensi.jam_masuk', 'absensi.jam_keluar', 'absensi.durasi',
            ]);
        return view('Mahasiswa.detail-kls', compact('kelas'));
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
