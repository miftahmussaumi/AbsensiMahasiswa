<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        if (isset($_POST["import"])) {

            $fileName = $_FILES["file"]["tmp_name"];
            $namaFile = $_FILES["file"]["name"];
            // utf8_fopen_read
            $file = fopen($fileName, "r" );
            $skipLines = 7;
            $lineNum = 1;
            
            while (fgetcsv($file)) {
                if ($lineNum > $skipLines) {
                    break;
                }
                $lineNum++;
            }
            $importData_arr = array();
            $i = 0;
            while (($filedata = fgetcsv($file, 1000, "\t")) !== FALSE) {
                $num = count($filedata);
                $num--;
                for ($c = 0; $c < $num; $c++) {
                    if ($c == 1) {
                        $importData_arr[$i][$c] = explode(",", $filedata[$c]);
                        if ($c == 1) {
                            $importData_arr[$i][$c] = explode(" ", $filedata[$c]);
                        }
                    }
                    if ($c==2) {
                        $importData_arr[$i][$c] = explode(",",$filedata[$c]);
                        if ($c == 2) {
                            $importData_arr[$i][$c] = explode(" ", $filedata[$c]);
                        }
                    }
                    if ($c == 0) {
                        $importData_arr[$i][$c] = substr($filedata[$c], -20);
                    }
                    
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            // echo "<pre>";
            // print_r($importData_arr);
            $cek=DB::table('krs')
            ->join('mahasiswa', 'mahasiswa.id','=','krs.mahasiswa_id')
            ->join('kelas','kelas.id','=','krs.kelas_id')
            ->where('kelas.kode_kelas','=','K001')
            ->get (['mahasiswa.nim']);
            // echo "<pre>";
            // print_r($cek);
            
            foreach ($cek as $value) 
            $array[] = $value->nim;
            $jml=strlen($importData_arr[0][2][1]);
            echo "<pre>";
            dd($importData_arr);
            // print_r($jml);
            // foreach ($array as $data) {
            foreach ($importData_arr as $importData) {
                    // $data="1911520009";
                    // if ($data == $importData[0]) {
                    //     echo "<pre>";
                    //     print("true");
                    // } else {
                    //     echo "<pre>";
                    //     print("false");
                    // }
                //     // echo "<pre>";
                //     // print_r($data);
                // }
                    // echo "<pre>";
                    // print_r($array);
                    // print_r($importData[0]);

                
            }
                // foreach ($cek as $check ) {
                //     echo "<pre>";
                //     print_r($cek);
                //     print_r($importData);
                // }
                // SELECT mahasiswa.nim, kelas.kode_kelas FROM krs JOIN mahasiswa ON 
                    // mahasiswa.id=krs.mahasiswa_id JOIN kelas ON kelas.id=krs.kelas_id 
                    // WHERE kelas.kode_kelas='K001'
                    // echo "<pre>";
                    // print_r($check->nim);
                    // if(in_array($importData[0],$cek[0])){
                    //     echo "<pre>";
                    //     print("true");
                    // } else {
                    //     echo "<pre>";
                    //     print("false");
                    // }
                    // echo "<pre>";
                    // print_r($importData_arr[0][0]);
                    // Absensi::create([
                    //     'krs_id' => 1,
                    //     'pertemuan_id' => 2,
                    //     'jam_masuk' => $importData[1][1],
                    //     'jam_keluar' => $importData[2][1],
                    //     'durasi' => $importData[4]
                    // ]);
                
            
            // return redirect('kelas');
            fclose($file);
        }
       
    }
}
