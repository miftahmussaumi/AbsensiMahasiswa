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

}
