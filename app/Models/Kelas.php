<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas"; //cek
    protected $primaryKey = "id"; //cek
    protected $fillable = [
        'id','kode_kelas','kode_matkul','nama_matkul','tahun','semester','sks'
    ];

}
