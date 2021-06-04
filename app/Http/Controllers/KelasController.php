<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
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
        $validation = $request->validate([
            'kode_kelas' => 'required',
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'tahun' => 'required|integer',
            'semester' => 'required|integer',
            'sks' => 'required|integer',
        ],
        [
            'kode_kelas.required' => 'Kode Kelas Tidak Boleh Kosong',
            'kode_matkul.required' => 'Kode MatKul Tidak Boleh Kosong',
            'nama_matkul.required' => 'Nama MatKul Tidak Boleh Kosong',
            'tahun.required' => 'Tahun Tidak Boleh Kosong',
            'tahun.integer' => 'Tahun Hanya Boleh Angka',
            'semester.required' => 'Semester Tidak Boleh Kosong',
            'semester.integer' => 'Semester Hanya Boleh Angka',
            'sks.required' => 'SKS Tidak Boleh Kosong',
            'sks.integer' => 'SKS Hanya Boleh Angka'
        ]
        );

        $kelas_kode = $request->kode_kelas;
        $kls = DB::table('kelas') -> where('kode_kelas','=',$kelas_kode)->get();
        $jml = count(collect($kls));
    
        if($jml > 0){
            return redirect('tambah-kelas')->with('error', 'Kode Kelas sudah pernah diinputkan');
        } else {
            Kelas::create([
                'kode_kelas' => $request->kode_kelas,
                'kode_matkul' => $request->kode_matkul,
                'nama_matkul' => $request->nama_matkul,
                'tahun' => $request->tahun,
                'semester' => $request->semester,
                'sks' => $request->sks
            ]);
            return redirect('kelas')->with('success', 'Data Kelas Berhasil Ditambahkan');
        }
        
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
        $validation = $request->validate([
            'kode_kelas' => 'required',
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'tahun' => 'required|integer',
            'semester' => 'required|integer',
            'sks' => 'required|integer',
        ],
        [
            'kode_kelas.required' => 'Kode Kelas Tidak Boleh Kosong',
            'kode_matkul.required' => 'Kode MatKul Tidak Boleh Kosong',
            'nama_matkul.required' => 'Nama MatKul Tidak Boleh Kosong',
            'tahun.required' => 'Tahun Tidak Boleh Kosong',
            'tahun.integer' => 'Tahun Hanya Boleh Angka',
            'semester.required' => 'Semester Tidak Boleh Kosong',
            'semester.integer' => 'Semester Hanya Boleh Angka',
            'sks.required' => 'SKS Tidak Boleh Kosong',
            'sks.integer' => 'SKS Hanya Boleh Angka'
        ]
        );
        
            $kls = Kelas::findorfail($id);
            $kls->update($request->all());
            return redirect('kelas')->with('edit','Data Kelas Berhasil Diperbarui');

    }

    //hapus
    public function destroy($id)
    {
        $kls = Kelas::findorfail($id);
        $kls->delete();
        return back()->with('delete', 'Data Kelas Berhasil Dihapus');
    }
}