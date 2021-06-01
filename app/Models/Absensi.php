<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'krs_id', 'pertemuan_id', 'jam_masuk', 'jam_keluar', 'durasi'
    ];
}
