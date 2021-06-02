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
                // $jml = strlen ($data[0][0]);
                // $cek=DB::table('krs')
                // ->join('mahasiswa', 'mahasiswa.id','=','krs.mahasiswa_id')
                // ->join('kelas','kelas.id','=','krs.kelas_id')
                // ->where('kelas.kode_kelas','=','K001')
                // ->get (['mahasiswa.nim']);
                // foreach ($cek as $value) {
                //     $db[] = $value->nim;
                // }
                $check = count ($data);
                
                // for ($a=0 ; $a<$check ; $a++){
                //     $cek = DB::table('krs')
                //         ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
                //         ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                //         ->where('kelas.kode_kelas', '=', 'K001')
                //         ->where('mahasiswa.nim', '=', $data[0])
                //         ->get();
                //     $jml = count($cek);
                //     if ($jml > 0) {
                //         // dd($data[0]);
                //         // Absensi::create([
                //         //     'krs_id' => 1,
                //         //     'pertemuan_id' => 2,
                //         //     'jam_masuk' => $dt[1][1],
                //         //     'jam_keluar' => $dt[2][1],
                //         //     'durasi' => $dt[4]
                //         // ]);
                //         // return redirect('kelas');
                //     }
                // }
                
                foreach ($data as $dt) {
                    $cek = DB::table('krs')
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'krs.mahasiswa_id')
                    ->join('kelas', 'kelas.id', '=', 'krs.kelas_id')
                    ->where('kelas.kode_kelas', '=', 'K001')
                    ->where('mahasiswa.nim','=',$dt[0])
                    ->get('krs.id AS krs_id');
                    $jml = count ($cek);
                    // print($jml);
                    // if($jml > 0){
                        // var_dump($dt[0]);
                        // var_dump($dt[5]);
                        // foreach ($cek as $c) {
                        //     Absensi::create([
                        //         'krs_id' => $c->krs_id,
                        //         'pertemuan_id' => 2,
                        //         'jam_masuk' => strtotime($dt[1][1]),
                        //         'jam_keluar' => strtotime($dt[2][1]),
                        //         'durasi' => $dt[4]
                        //     ]);
                        //     return redirect('kelas');
                        // }
                    // }
                }
                // for ($a=0 ; $a<$check ; $a++){
                //     foreach($data as $dt){
                //         if($dt[0]==$db[$a]){
                //             print_r($dt[0]);
                //             $a++;
                //         }
                //     }
                // }
                // $a=0;
                // foreach ($data as $dt) {
                //     if ($dt[0]==$db[$a] && $a < $check){
                //         $a++;
                //         // Absensi::create([
                //         //     'krs_id' => 1,
                //         //     'pertemuan_id' => 2,
                //         //     'jam_masuk' => $dt[1],
                //         //     'jam_keluar' => $dt[2],
                //         //     'durasi' => $dt[3]
                //         // ]);
                //         // return redirect('kelas');
                //         print($dt[0]);
                //     }
                // }
                // echo "<pre>";
                // dd($data);
            }
        }
    }
}
