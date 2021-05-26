<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    protected $table = "pertemuan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','kelas_id','pertemuan_ke','tanggal','materi'
    ];

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }
}
