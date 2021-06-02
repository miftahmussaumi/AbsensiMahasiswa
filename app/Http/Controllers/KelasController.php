<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{

    public function index()
    {
        $dtKelas = Kelas::all();
        return view('Halaman.kelas',compact('dtKelas')); 
    }

   //tambah
    public function create()
    {
        return view('Halaman.create.c-kelas');
    }

    //simpan
    public function store(Request $request)
    {
        $kelas_kode = $request->kode_kelas;
        $kls = DB::table('kelas') -> where('kode_kelas','=',$kelas_kode)->get();
        $jml = count(collect($kls));
    
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
    //edit
    public function edit($id)
    {
        $kls = Kelas::findorfail($id);
        return view('Halaman.edit.e-kelas',compact('kls'));
    }

    //update
    public function update(Request $request, $id)
    {
        $kls = Kelas::findorfail($id);
        $kls->update($request->all());
        return redirect('kelas')->with('edit','Data Mahasiswa Berhasil Diedit');
    }

    //hapus
    public function destroy($id)
    {
        $kls = Kelas::findorfail($id);
        $kls->delete();
        return back()->with('delete', 'Data Kelas Berhasil Dihapus');
    }
}
