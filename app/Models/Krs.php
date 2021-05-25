<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Krs extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['id', 'kelas_id', 'mahasiswa_id'];

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(Mahasiswa::class);
    // }
    
    public function allData(){
        return
        DB::table('pertemuan')
        ->select(
            'kelas.kode_kelas',
            'kelas.kode_matkul',
            'kelas.nama_matkul',
            'kelas.tahun',
            'kelas.semester',
            'kelas.sks',
            'mahasiswa.nama',
            'mahasiswa.nim',
            'pertemuan.pertemuan_ke',
            'pertemuan.tanggal',
            'pertemuan.materi'
        )
        ->join('kelas', 'pertemuan.kelas_id', '=','kelas.id')
        ->join('krs', 'krs.kelas_id', '=', 'kelas.id')
        ->rightJoin('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
        ->where('kelas.id', '=', $id)
        ->get();
    }
}
