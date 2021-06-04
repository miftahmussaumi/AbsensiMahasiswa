<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function store (Request $request){
        if (isset($_POST["import"])){
            $fileName = $_FILES["file"]["tmp_name"];
            $namaFile = $_FILES["file"]["name"];
            $ekstensiValid = 'csv';
            $ekstensiFile = explode('.', $namaFile);
            $ekstensiFile = strtolower(end($ekstensiFile));
            if ($ekstensiFile != $ekstensiValid) {
                print("salah");
            } else {
                $file = fopen($fileName, "r");
                $skipLines = 7;
                $lineNum = 1;
                while (fgetcsv($file)) {
                    if ($lineNum > $skipLines) {
                        break;
                    }
                    $lineNum++;
                }
                $data = array();
                $i=0;
                while (($column = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($column);
                    $num--;
                    for ($c = 0 ; $c < $num ; $c++){
                        if ($c == 0) {
                            $data[$i][$c] = substr($column[$c], -10);
                        }
                        if ($c == 1) {
                        $data[$i][$c] = explode(",", $column[$c]);
                            if ($c == 1) {
                                $data[$i][$c] = explode(" ", $column[$c]);
                            }
                        }
                        if ($c == 2) {
                            $data[$i][$c] = explode(",",$column[$c]);
                            if ($c == 2) {
                                $data[$i][$c] = explode(" ", $column[$c]);
                            }
                        }
                        $data[$i][] = $column[$c];
                    }
                    $i++;
                }
                $masuk=strtotime($data[0][2][1]);
                echo "<pre>";
                dd($masuk);
                $check = count($data);
                // foreach ($data as $dt) {
                //     $cek = DB::table('krs')
                //     ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
                //     ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                //     ->where('kelas.id', '=', $request->kelas_id)
                //     ->where('mahasiswa.nim','=',$dt[0])
                //     ->get('krs.id AS krs_id');
                //     $jml = count ($cek);

                //     // $durasi = (strtotime($dt[2][1]) - strtotime($dt[1][1])) / 60;
                //     if($jml > 0){
                //         foreach ($cek as $c) {
                //             Absensi::create([
                //                 'krs_id' => $c->krs_id,
                //                 'pertemuan_id' => $request->pertemuan_id,
                //                 'jam_masuk' => $dt[1][1],
                //                 'jam_keluar' => $dt[2][1],
                //                 'durasi' => $dt[4]
                //             ]);
                //             // return redirect('kelas');
                //         }
                //     }
                // }
                // return redirect()->back();
                
                
            }
        }
    }
}
