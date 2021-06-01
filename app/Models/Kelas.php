<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kelas extends Model
{
    use HasFactory, Notifiable;

    protected $table = "kelas"; //cek
    protected $primaryKey = "id"; //cek

    protected $fillable = [
        'id','kode_kelas','kode_matkul','nama_matkul','tahun','semester','sks'
    ];

    public function krs(){
        return $this->hasMany(Krs::class);
    }

    public function pertemuan(){
        return $this->hasMany(Pertemuan::class);
    }
}
