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
        
    }
}
