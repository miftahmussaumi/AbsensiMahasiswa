@extends('template.index')

@section('title','Detail Kelas')
@section('judul_atas')
<h1>Detail Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header border-bottom-0">
                        @foreach($kode as $code)
                        <p class="text-sm"><b>KELAS {{$code->kode_kelas}}</b></p>
                        <h2 class="lead"><b></b></h2>
                        <p class="text-sm"><b>Mata Kuliah : </b>{{$code->nama_matkul}}</p>
                        <p class="text-sm"><b>Semester : </b>{{$code->semester}}</p>
                        <p class="text-sm"><b>Tahun : </b>{{$code->tahun}}</p>
                        <p class="text-sm"><b>SKS : </b>{{$code->sks}}</p>
                        <a href="{{ url('mhs', $code->mahasiswa_id) }}" class="btn  btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 invoice-col">
            </div>
            <div class="col-sm-2 invoice-col">
                <!-- <h4 style="text-align: center;">Kehadiran Pertemuan</h4> -->
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="100">Kelas {{$code->kode_kelas}}</th>
                        </tr>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach($pert as $pt)
                        <tr>
                            <td>Pertemuan-ke {{$pt->pertemuan_ke}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-1 invoice-col">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="100">Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($jml > 0){
                            for ($i = 0; $i < $tot; $i++) {
                                echo '<tr>';
                                $i++;
                                if (key_exists($i, $ambil)) {
                                    echo '<td>Hadir </td>';
                                    // print("hadir");
                                } else {
                                    echo '<td> <b>Absen </b></td>';
                                    // print("absen");
                                }
                                $i--;
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr>';
                            echo '<td><b>Absensi belum ada</b></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection